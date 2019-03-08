<?php
namespace App\Classes;

use Cart;
use Auth;
use Cookie;
use App\User;
use App\UserLevel;
use App\Functions;
use App\OrderStatus;
use App\Models\Order;
use App\Models\UserData;
use App\Models\OrderLog;
use Illuminate\Http\Request;
use App\Models\OrderContent;
use Illuminate\Support\Facades\Hash;

class CheckoutManager
{

    protected $request;
    protected $userLevel = UserLevel::USER;
    protected $user;

    public $authenticate = false;
    public $saveData = true;

    function __construct($request)
    {
        $this->request = $request;
    }

    public function saveData()
    {
        $request = $this->request;

        if($this->saveData)
        {
            $user = $this->createUserAccount($request);

            $this->user = $user;

            //save the user data
            $userData = $this->saveUserData($user, $request);
        }

        //place order
        $order = $this->placeOrder();

        $this->LogOrderConfirmation($order);
        $this->emptyCart();
        $this->FireOrderPlacedEvent($order);

        $this->finish();

        return;
    }

    private function createUserAccount($request)
    {
        $user  = new User;

        $name = $request->first_name . ' ' . $request->last_name;

        //assume everything has been validated
        $user->email = $request->email;
        $user->password = $request->password;
        $user->level = $this->userLevel;
        $user->name = $name;
        $user->password = Hash::make($request->password);

        //save the user
        $user->save();

        return $user;

    }

    private function saveUserData($user, $request)
    {
        //if data exists, then update only
        if($user->userData == null)
        {
            $userData = new UserData;
        }
        else {
            $userData = $user->userData;
        }

        //check referrer information
        if($request->referred == "yes")
        {
            $referred = true;
            $referrer = $this->getReferrer($request->ref_id);

            if(!is_null($referrer))
            {
                $ref_code = $referrer->userData->ref_code;
            }
            else {
                $ref_code = null;
            }
        }
        else {
            $referred = false;
            $ref_code = null;
        }

        $userData->user_id = $user->id;
        $userData->cookie = $this->getCookie();
        $userData->avatar = User::DEFAULT_AVATAR;
        $userData->first_name = $request->first_name;
        $userData->last_name = $request->last_name;
        $userData->referred = $referred;
        $userData->referrer_code = $ref_code;
        $userData->ref_code = $this->generateRefCode();
        $userData->region = $request->region;
        $userData->address = $request->address;
        $userData->email = $request->email;
        $userData->tel = $request->tel;

        //save the user Data ;
        $userData->save();

        return $userData;
    }

    private function getCookie()
    {
        return Cookie::get(\App\UserCookie::NAME);
    }

    private function getReferrer($code)
    {
        $user = User::where('email', '=', $code)->first();

        if($user == null)
        {
            //get the person with this ref code
            $userData = UserData::where('ref_code', '=', $code)->first();

            if($userData != null)
            {
                $user = $userData->user;
            }
            else {
                $user = null;
            }
        }

        return $user;
    }

    private function generateRefCode()
    {
        $length = 8;

        //generate only random digits
        $code = '';

        while(strlen($code) < $length)
        {
            $num = rand(0, 9);

            $code .= $num;
        }

        if($this->codeExists($code))
        {
            //generate a new one
            do {
                $code = '';

                while(strlen($code) < $length)
                {
                    $num = rand(0, 9);

                    $code .= $num;
                }

            } while ($this->codeExists($code));
        }
        else {
            return $code;
        }
    }

    private function codeExists($code)
    {
        $user = UserData::where('ref_code', '=', $code)->first();

        if($user == null)
        {
            return false;
        }

        return true;
    }

    //order methods
    private function placeOrder()
    {
        $code = $this->generateOrderCode();
        $order = $this->saveOrder($code);

        //save the order Contents
        $this->saveOrderContent($order);
        return $order;
    }

    private function saveOrder($orderCode)
    {
        $order = new Order;

        $order->user_id = auth()->user()->id;
        $order->order_code = $orderCode;
        $order->total = Functions::getMoney(Cart::total());
        $order->item_number = Cart::count();
        $order->status = OrderStatus::PENDING;
        $order->payment_method = $this->request->payment_method;

        $order->save();

        return $order;
    }

    private function saveOrderContent($order)
    {
        $content = Cart::content();

        foreach($content as $item)
        {
            $orderContent = new OrderContent;

            $orderContent->order_id = $order->id;
            $orderContent->product_id = $item->id;
            $orderContent->name = $item->name;
            $orderContent->price = $item->price;
            $orderContent->quantity = $item->qty;

            $orderContent->save();
        }
    }

    private function generateOrderCode()
    {
        $code = $this->createOrderCode();
        return $code;
    }

    private function createOrderCode()
    {
        //grab the last order and add one to it
        $order = Order::orderBy('id', 'desc')->first();

        if($order == null)
        {
            //the first code
            $code = $this->formCode(0);
        }
        else {
            //get the id
            $id = $order->id;
            $code = $this->formCode($id);
        }

        if(!$this->orderCodeExist($code))
        {
            return $code;
        }
        else {
            do {
                ++$id;
                $code = $this->formCode($id);
            } while ($this->orderCodeExist($code));

            return $code;
        }
    }

    private function formCode($id)
    {
        ++$id;
        $ord = "ORD.";

        if($id < 10)
            $zeros = "00000";
        elseif($id < 100)
            $zeros = "0000";
        elseif($id < 1000)
            $zeros = "000";
        elseif($id < 10000)
            $zeros = "00";
        elseif($id < 100000)
            $zeros = "0";
        else {
            $zeros = "";
        }

        return $code = $ord . $zeros . $id;
    }

    private function orderCodeExist($code)
    {
        $order = Order::where('order_code', '=', $code)->first();

        if($order == null)
            return false;

        return true;
    }

    //finishing touches for orders
    //log the order messages and clear cart
    private function LogOrderConfirmation($order)
    {
        $orderLog = new OrderLog;

        $orderLog->order_id = $order->id;
        $orderLog->user_id = auth()->user()->id;
        $orderLog->tag = "Order";
        $orderLog->name = auth()->user()->name;
        $orderLog->description = "Order was Placed";

        $orderLog->save();
    }

    private function emptyCart()
    {
        Cart::destroy();
    }

    private function FireOrderPlacedEvent($order)
    {
        return;
    }

    private function finish()
    {
        if($this->authenticate)
        {
            $this->authenticateUser();
        }
    }

    private function authenticateUser()
    {
        $email = $this->request->email;
        $password = $this->request->password;

        $remember = true;

        Auth::attempt([
            'email' => $email,
            'password' => $password
        ], $remember);
    }
}

?>

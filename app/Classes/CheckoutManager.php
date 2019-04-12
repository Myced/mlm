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
use App\Models\OrderPoint;
use App\Events\OrderPlaced;
use Illuminate\Http\Request;
use App\Models\OrderContent;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PointsReceived;

class CheckoutManager
{
    const POINT = 1000;

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

        $user = null;

        if($this->saveData)
        {
            $user = $this->createUserAccount($request);

            //save the user data
            $userData = $this->saveUserData($user, $request);

            //raise an event for the registered user
            $user->refresh();
            event(new UserRegistered($user));
        }

        $this->setUser($user);

        //place order
        $order = $this->placeOrder();

        //if it is user registration,
        //then the registered user should have
        // this initial order points too
        $order->refresh();

        if($this->saveData)
        {
            if($this->authenticate != true)
            {
                //add the points when u are not registering yourself.
                //points will be added in the order payment listener
                //
                //add points when a new user is being registered
                //which means authentication has to be false;

                $orderPoint = new OrderPoint;

                $orderPoint->order_id = $order->id;
                $orderPoint->user_id = $user->id;
                $orderPoint->points = $order->points;

                $comment = "Points received for the order made during your recruitment";

                $orderPoint->comment = $comment;

                $orderPoint->save();

                $user->userData->addPoints($order->points);

                //notify the user of the points received
                $user->notify(new PointsReceived($orderPoint));
            }
        }

        $this->LogOrderConfirmation($order);
        $this->emptyCart();
        $this->FireOrderPlacedEvent($order);

        $this->finish();

        return;
    }

    private function setUser($user)
    {

        if(auth()->user())
        {
            //meaning a new user account was not created
            $this->user = auth()->user();
        }
        else {
            $this->user = $user;
        }
    }

    private function createUserAccount($request)
    {
        $user  = new User;

        $name = $request->first_name . ' ' . $request->last_name;

        //assume everything has been validated
        $user->email = $request->email;
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
        $userData->region_id = $request->region;
        $userData->address = $request->address;
        $userData->email = $request->email;
        $userData->tel = $request->tel;

        ///payout settings
        $userData->payout_network = $request->payout_network;
        $userData->payout_number = $request->payout_number;

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

        //raise an order placed event
        event(new OrderPlaced($order));

        return $order;
    }

    private function saveOrder($orderCode)
    {
        $order = new Order;
        $total = Functions::getMoney(Cart::total());

        $points = round($total/static::POINT, 1);

        $order->user_id = $this->user->id;
        $order->order_code = $orderCode;
        $order->total = $total;
        $order->points = $points;
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
        $orderLog->user_id = $this->user->id;
        $orderLog->tag = "Order";
        $orderLog->name = $this->user->name;
        $orderLog->description = "Order was Placed";

        $orderLog->save();
    }

    private function emptyCart()
    {
        Cart::destroy();

        //if the cart exist in the database then delete it
        $cookie = Cookie::get(\App\UserCookie::NAME);

        if(!is_null($cookie))
        {
            if(!empty($cookie))
            {
                Cart::deleteStoredCart($cookie);
            }
        }
    }

    private function FireOrderPlacedEvent($order)
    {
        //this has already been done in place order method
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

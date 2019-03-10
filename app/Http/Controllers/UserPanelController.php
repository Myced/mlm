<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Classes\OrderManager;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function orders()
    {
        $orders = $this->getOrders();

        return view('user.orders', compact('orders'));
    }

    public function orderDetail($code)
    {
        $order = Order::where('order_code', '=', $code)->first();

        return view('user.order_detail', compact('order'));

    }

    private function getOrders()
    {
        $user = $this->getUser();

        return $orders = $user->orders;
    }

    private function getUser()
    {
        if(!auth()->user())
        {
            return null;
        }
        else {
            return auth()->user();
        }
    }

    public function profile()
    {
        //just pass the user along
        $user = $this->getUser();

        return view('user.profile', compact('user'));
    }

    public function profileEdit()
    {
        $user = $this->getUser()->userData;

        return view('user.profile_edit', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = $this->getUser()->userData;

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->tel = $request->tel;
        $user->address = $request->address;
        $user->region_id = $request->region;
        $user->dob = $request->dob;
        if(!empty($request->avatar))
        {
            $user->avatar = $this->updateAvatar($request->avatar, $user->avatar);
        }

        $user->save();

        Session::flash('success', 'Profile Updated');

        return redirect()->route('user.profile');
    }

    private function updateAvatar($file, $oldAvatar)
    {
        //delete the old avatar
        if($oldAvatar != \App\User::DEFAULT_AVATAR)
        {
            $length = strlen($oldAvatar);

            $name = substr($oldAvatar, 1, $length);

            if(file_exists($name))
            {
                unlink($name);
            }
        }

        $name = time() . $file->getClientOriginalName();
        $path = \App\User::AVATAR_PATH;

        $file->move($path, $name);

        return '/' . $path . $name;
    }
}

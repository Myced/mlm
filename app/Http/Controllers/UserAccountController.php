<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function changePassword()
    {
        return view('user.change_password');
    }

    public function updatePassword(Request $request)
    {
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $repeat_password = $request->repeat_password;

        //make sure the password is correct
        $user = auth()->user();

        if(empty($new_password))
        {
            session()->flash('error', 'You must provide a new password');
            return back();
        }

        if(!Hash::check($current_password, $user->password))
        {

            session()->flash('error', "Current password is incorrect");
            return back();
        }
        else {
            if($new_password != $repeat_password)
            {
                session()->flash('error', 'New password and repeated password do not match');
                return back();
            }
            else {
                //update the password
                $user->password = Hash::make($new_password);
                $user->save();

                session()->flash('success', "Password updated");
                return back();
            }
        }
    }
}

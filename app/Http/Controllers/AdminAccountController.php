<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLevel;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if(isset($request->remember))
        {
            $remember = true;
        }
        else {
            $remember = false;
        }


        //attemt the login
        $response = auth()->attempt([
            'email' => $email,
            'password' => $password
        ], $remember);


        if($response == false)
        {
            session()->flash('error', 'Username or password is incorrect');
            return back();
        }

        //get the user and verify that they have permission
        $user = User::where('email', '=', $email)->first();

        if($user->level != UserLevel::ADMIN )
        {
            //send them to a 401 page
            return redirect()->route('error.401');
        }

        //send them to the dashbard
        return redirect()->route('dashboard');
    }
}

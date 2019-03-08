<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\UserData;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function verifyRef(Request $request)
    {
        //grab the ref id
        $ref = $request->ref;
        $cookie = $request->cookie;

        $user = User::where('email', '=', $ref)->first();

        $status = false;
        $message  = "";

        if($user == null)
        {
            //check user data
            $user = UserData::where('ref_code', '=', $ref)->first();

            if($user == null)
            {
                $message = "Referrer Not found";
            }
            else {
                $status = true;
                $message = $user->first_name . ' ' . $user->last_name;
            }
        }
        else {
            $status = true;
            $name = $user->userData->first_name . ' ' . $user->userData->last_name;
            $message = $name;
        }

        $response = [
            'status' => $status,
            "message" => $message
        ];

        return json_encode($response);
    }

    public function email($email)
    {
        $response = [
            'status' => true,
            "message" => ""
        ];

        //check the email
        $user = User::where('email', '=', $email)->first();

        if(is_null($user))
        {
            $response['message'] = "Email Valid";
        }
        else {
            $response['status'] = false;
            $response['message'] = "Email already taken";
        }

        return response()->json($response);
    }
}

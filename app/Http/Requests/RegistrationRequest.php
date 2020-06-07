<?php

namespace App\Http\Requests;

use Hash;
use Cookie;
use App\User;
use App\UserLevel;
use App\Models\UserData;
use App\Classes\GenerateRefCode;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    use GenerateRefCode;
    
    public $user;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //everybody can access this.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // no validation rules for now.
        ];
    }

    public function register()
    {
        $user = $this->createUserAccount();

        //save the user data
        $userData = $this->saveUserData($user);

        //raise an event for the registered user
        $user->refresh();

        $this->user = $user;
    }

    private function createUserAccount()
    {
        $user  = new User;

        $name = $this->first_name . ' ' . $this->last_name;

        //assume everything has been validated
        $user->email = $this->email;
        $user->level = UserLevel::USER;
        $user->name = $name;
        $user->password = Hash::make($this->password);

        //save the user
        $user->save();

        return $user;
    }

    private function saveUserData($user)
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
        if($this->referred == "yes")
        {
            $referred = true;
            $referrer = $this->getReferrer($this->ref_id);

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
        $userData->first_name = $this->first_name;
        $userData->last_name = $this->last_name;
        $userData->referred = $referred;
        $userData->referrer_code = $ref_code;
        $userData->ref_code = $this->generateRefCode();
        $userData->region_id = $this->region;
        $userData->address = $this->address;
        $userData->email = $this->email;
        $userData->tel = $this->tel;

        ///payout settings
        $userData->payout_network = $this->payout_network;
        $userData->payout_number = $this->payout_number;

        //save the user Data ;
        $userData->save();

        return $userData;
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

    private function getCookie()
    {
        return Cookie::get(\App\UserCookie::NAME);
    }
}

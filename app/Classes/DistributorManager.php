<?php
namespace App\Classes;

use App\User;
use App\UserLevel;
use App\Models\UserData;
use Illuminate\Support\Facades\Hash;

class DistributorManager
{
    protected $distributor;

    public function __construct($distributor)
    {
        $this->distributor = $distributor;
    }

    public function save($request)
    {
        $user = $this->distributor;

        $name = $request->first_name . ' ' . $request->last_name;

        //assume everything has been validated
        $user->email = $request->email;
        $user->level = UserLevel::DISTRIBUTOR;
        $user->name = $name;
        $user->password = Hash::make($request->password);

        //save the user
        $user->save();

        $user->fresh();
        $this->saveUserData($request, $user->id);

        return;
    }

    public function update($request)
    {
        $user = $this->distributor;

        $name = $request->first_name . ' ' . $request->last_name;

        //assume everything has been validated
        $user->name = $name;

        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }

        //save the user
        $user->save();

        $this->updateUserData($user->userData, $request);
        return ;
    }

    private function updateUserData($userData, $request)
    {
        if(!empty($request->avatar))
        {
            $this->deleteAvatar($userData->avatar);
            $userData->avatar = $this->saveAvatar($request->avatar);
        }

        $userData->first_name = $request->first_name;
        $userData->last_name = $request->last_name;
        $userData->region_id = $request->region;
        $userData->address = $request->address;
        $userData->tel = $request->tel;

        //save the user Data ;
        $userData->save();
    }

    private function deleteAvatar($avatar)
    {
        if($avatar != User::DEFAULT_AVATAR)
        {
            $length = strlen($avatar);

            $name = substr($avatar, 1, $length);

            if(file_exists($name))
            {
                unlink($name);
            }
        }
    }

    private function saveUserData($request, $userId)
    {
        $userData = new UserData;

        $userData->user_id = $userId;
        $userData->cookie = null;

        if(empty($request->avatar))
        {
            $userData->avatar = User::DEFAULT_AVATAR;
        }
        else {
            $userData->avatar = $this->saveAvatar($request->avatar);
        }

        $userData->first_name = $request->first_name;
        $userData->last_name = $request->last_name;
        $userData->referred = false;
        $userData->referrer_code = null;
        $userData->ref_code = $this->generateRefCode();
        $userData->region_id = $request->region;
        $userData->address = $request->address;
        $userData->email = $request->email;
        $userData->tel = $request->tel;

        //save the user Data ;
        $userData->save();
    }

    private function saveAvatar($file)
    {
        $name = time() . $file->getClientOriginalName();

        $path = User::AVATAR_PATH;

        $file->move($path, $name);

        $url = '/' . $path . $name;

        return $url;
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
}
?>

<?php
namespace App\Classes;

/**
 * Trait to generate a user Referral Code
 */
use App\Models\UserData;


trait GenerateRefCode
{
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

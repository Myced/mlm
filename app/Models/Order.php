<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function content()
    {
        return $this->hasMany("App\Models\OrderContent");
    }

    public function commissions()
    {
        return $this->hasMany("App\Models\OrderCommission");
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }

    public function logs()
    {
        return $this->hasMany('App\Models\OrderLog');
    }

    public static function getBeneficiary($user, $level)
    {
        $userData = $user->UserData;

        for($i = 1; $i <= $level; $i++)
        {
            if(is_null($userData))
            {
                break;
            }

            $userData = $userData->parent();
        }

        return $userData;
    }
}

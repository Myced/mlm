<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const DEFAULT_AVATAR = '/site/images/user.png';
    const AVATAR_PATH = 'uploads/avatars/';

    public function userData()
    {
        return $this->hasOne('App\Models\UserData');
    }

    public function orders()
    {
        return $this->hasMany("App\Models\Order");
    }

    public function commissions()
    {
        return $this->hasMany('App\Models\OrderCommission');
    }

    public function latestCommissions()
    {
        return \App\Models\OrderCommission::where('user_id', '=', $this->id)
                                ->latest()
                                ->limit(5)
                                ->get();
    }

    public function orderValue()
    {
        if(count($this->orders) == 0)
        {
            return 0;
        }

        return number_format($this->orders->sum('total'));
    }
}

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

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }

    public function logs()
    {
        return $this->hasMany('App\Models\OrderLog');
    }
}

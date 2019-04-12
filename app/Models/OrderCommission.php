<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCommission extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function beneficiary()
    {
        // return $this->belongsTo('App\User');
        return \App\User::find($this->user_id);
    }

    public function markAsPaid()
    {
        $this->collected = true;
        $this->save();
    }
}

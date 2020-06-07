<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPayout extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function markAsMoved()
    {
        $this->moved = true;
        $this->save();
    }
}

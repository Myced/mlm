<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //get the product out of stock
    public static function outOfStock()
    {
        return SELF::where('quantity', '=', 0)->get();
    }

    public function category()
    {
        return $this->belongsTo('App\Admin\Category');
    }

    public function isNew()
    {
        return true;
    }

    public function isOnPromotion()
    {
        return true;
    }

    public function addView()
    {
        $this->increment('views');
    }
}

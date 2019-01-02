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

    public function isNew()
    {
        return true;
    }

    public function isOnPromotion()
    {
        return true;
    }
}

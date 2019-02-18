<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
    //get the product out of stock
    protected $percetage;
    protected $onPromotion;


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
        return rand(0,2);
    }

    public function isOnPromotion()
    {
        if($this->onPromotion == null)
        {
            $promotion = rand(0,2);
            $this->onPromotion = $promotion;
            return $this->onPromotion;
        }
        return $this->onPromotion;
    }

    public function getPercentage()
    {
        if($this->percentage == null)
        {
            $percentage = rand(0, 70);
            $this->percentage = $percentage;
            return $this->percentage;
        }

        return $this->percentage;
    }

    public function getPrice()
    {
        $percentage = $this->getPercentage();

        //calculate the deducation
        $deduction = ($percentage / 100) * $this->price;

        $deduction = ceil($deduction);

        return $this->price - $deduction;
    }

    public function isBestSeller()
    {
        $random = rand(0,2);
        return $random;
    }

    public function addView()
    {
        $this->increment('views');
    }

    //implemented methods
    public function getBuyableIdentifier($options = null) {
       return $this->id;
   }

   public function getBuyableDescription($options = null) {
       return $this->name;
   }

   public function getBuyablePrice($options = null) {
       return $this->price;
   }
}

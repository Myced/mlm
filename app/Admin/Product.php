<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //get the product out of stock
    protected $percetage;
    protected $onPromotion;

    const IMAGE_PATH = 'uploads/products/images/';
    const THUMBNAIL_PATH  = 'uploads/products/thumbnails/';
    const TINY_IMAGE_PATH = 'uploads/products/tiny/';


    public static function outOfStock()
    {
        return SELF::where('quantity', '=', 0)->get();
    }

    public function category()
    {
        return $this->belongsTo('App\Admin\Category');
    }

    public function movements()
    {
        return $this->hasMany('App\Models\ProductMovement')->orderByDesc('id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function orders()
    {
        $results = \App\Models\OrderContent::where('product_id', '=', $this->id)
                        ->groupBy('order_id', 'id')
                        ->orderBy('id')
                        ->get();

        if(!empty($results))
        {
            return $results->count();
        }

        return 0;
    }

    public function isNew()
    {
        $now = \Carbon\Carbon::now();
        
        return $now->diffInMonths($this->created_at) <= 4;
    }

    public function isOnPromotion()
    {
        return $this->promoted;
    }

    public function getPercentage()
    {
        return $this->percent_off;
    }

    public function getPrice()
    {
        return $this->promotion_price;
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


}

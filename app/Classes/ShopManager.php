<?php
namespace App\Classes;

use App\Models\Order;
use App\Admin\Product;
use App\Models\OrderContent;

class ShopManager
{
    public static function topOrdered($limit = 10)
    {
        $products = OrderContent::selectRaw('`product_id`, count(`product_id`) as orders')
                            ->groupBy('product_id')
                            ->orderBy('orders', 'desc')
                            ->limit($limit)
                            ->get();

        return $products;
    }

    public static function mostViewed($limit = 5)
    {
        return Product::where('published', '=', true)
                        ->orderBy('views', 'desc')
                        ->limit($limit)
                        ->get();
    }

    public static function lastestProducts($limit = 5)
    {
        return Product::where('published', '=', true)
                        ->orderBy('created_at', 'desc')
                        ->limit($limit)
                        ->get();
    }

    public static function topPromo($limit = 5)
    {
        return Product::where('published', true)
                        ->where('promoted', true)
                        ->orderBy('percent_off', 'desc')
                        ->get();
    }
}
?>

<?php
namespace App\Classes;

use App\Models\Order;
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
}
?>

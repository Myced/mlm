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
                        ->limit($limit)
                        ->get();
    }

    public static function relatedProducts($product, $limit = 10)
    {
        $related = [];

        $productId = $product->id;
        $brand = $product->brand_id;
        $category = $product->category_id;


        //selected the most view from this brand
        $products = Product::where('brand_id', $brand)
                            ->where('category_id', $category)
                            ->orderBy('views', 'desc')
                            ->limit($limit)
                            ->get();

        $left = $limit - $products->count();

        foreach($products as $product)
        {
            array_push($related, $product);
        }

        if($left > 0)
        {
            $used = $products->pluck('id');

            $products = Product::where('brand_id', '=' ,$brand)
                                ->orWhere('category_id', '=', $category)
                                ->limit($limit)
                                ->orderBy('views', 'desc')
                                ->get();

            foreach($products as $product)
            {
                if(!$used->contains($product->id))
                {
                    if($left >= 0)
                    {
                        array_push($related, $product);
                        --$left;
                    }
                    else {
                        break;
                    }
                }
            }

        }

        return $related;
    }
}
?>

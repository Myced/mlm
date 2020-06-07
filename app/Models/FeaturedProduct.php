<?php

namespace App\Models;

use App\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    public function model()
    {
        return Product::where('id', '=', $this->product_id)->first();
    }
}

<?php

namespace App\Models;

use App\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{
    public function product()
    {
        return Product::find($this->product_id);
    }
}

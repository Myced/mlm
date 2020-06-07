<?php

namespace App\Models;

use App\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{

    protected $model;

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
        return Product::find($this->product_id);
    }

    public function model()
    {
        if(is_null($this->model))
        {
            $this->model = Product::find($this->product_id);
            return $this->model;
        }

        return $this->model;
    }
}

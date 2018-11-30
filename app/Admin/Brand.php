<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

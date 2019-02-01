<?php

namespace App\Http\Controllers;

use App\Admin\Brand;
use App\Admin\Category;
use Illuminate\Http\Request;

class ApiBrandController extends Controller
{
    public function getBrands($cat)
    {
        return $cat;
    }

    public function getCatBrands($id)
    {
        $brands = Brand::where('category_id', '=', $id)->get();
        return response()->json($brands);
    }
}

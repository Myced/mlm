<?php

namespace App\Http\Controllers;

use App\Admin\Brand;
use App\Admin\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.brands', compact(['brands', 'categories']));
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $category = $request->category;

        $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
        ]);

        //make sure the name and category does not exist
        $query = Brand::where('name', '=', $name)
                        ->where('category_id', '=', $category)->get();

        if(count($query) != 0)
        {
            session()->flash('error', 'This Brand of this Category already exist');
            return back();
        }
        else {
            $brand = new Brand;
            $brand->category_id = $request->category;
            $brand->name = $request->name;
            $brand->description = $request->description;

            $brand->save();
            session()->flash('success', 'Brand Created');

            return back();
        }
    }
}

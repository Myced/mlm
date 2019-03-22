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
            session()->flash('error', 'This Brand already exist');
            return back();
        }
        else {
            $brand = new Brand;
            $brand->category_id = $request->category;
            $brand->name = $request->name;
            $brand->slug = str_slug($request->name);
            $brand->description = $request->description;

            $brand->save();
            session()->flash('success', 'Brand Created');

            return back();
        }
    }

    public function manage()
    {
        $brands  = Brand::all();

        return view('admin.manage_brands', compact('brands'));
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        $categories = Category::all();

        return view('admin.edit_brand', compact('brand', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->category_id  = $request->category;

        $brand->save();

        session()->flash('success', 'Brand Updated');

        return back();
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        $brand->delete();

        session()->flash("success", 'Brand Deleted');

        return back();
    }
}

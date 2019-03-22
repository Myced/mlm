<?php

namespace App\Http\Controllers;

use App\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories')->with('categories', $categories);
    }

    public function create()
    {
        //method never called
        return view('admin.create_category')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $category  = new Category;

        $name = $request->name;

        //validate that the name does not exist
        if(empty($name))
        {
            session()->flash('error', 'Category Name must be provided');
            return back();
        }
        else
        {
            //check for the category
            $query  = Category::where('name', '=', $name)->get();

            if(count($query) != 0)
            {
                session()->flash('error', 'Category Name already exist');
                return back();
            }
            else {
                //stor the category
                $category->name = $request->name;
                $category->slug = str_slug($request->name);
                $category->description = $request->description;
                $category->save();

                session()->flash('success', 'Category Saved');
                return back();
            }
        }
    }

    public function manage()
    {
        $categories = Category::all();

        return view('admin.manage_categories', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.edit_category')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        session()->flash('success', 'Category Updated');

        return back();
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        session()->flash('success', 'Category Deleted');

        return back();
    }
}

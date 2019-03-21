<?php

namespace App\Http\Controllers;

use Session;
use App\Admin\Brand;
use App\Admin\Product;
use App\Admin\Category;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Classes\ProductManager;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $out = Product::outOfStock()->count();
        return view('admin.products', compact('products', 'out'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.add_product', compact(['categories', 'brands']));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'product-name' => 'required',
        //     'price' => 'required',
        //
        // ]);

        $product = new Product;

        $manager = new ProductManager($product);
        $manager->saveProduct($request);

        //toast message
        Session::flash('success', 'Product Added');
        return back();
    }

    public function view($id)
    {
        $product  = Product::find($id);

        return view('admin.product', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.edit_product', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $manager = new ProductManager($product);
        $manager->saveProduct($request);

        session()->flash('success', 'Product Information has been updated');

        return back();
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        session()->flash('success', "Product Deleted");

        return back();
    }

    public function uploadImage(Request $request, $id)
    {
        $path = Product::IMAGE_PATH;
        $file = $request->file;

        $name = time() . $file->getClientOriginalName();

        $file->move($path, $name);

        $url = '/' . $path . $name;

        $image = new ProductImage;

        $image->product_id = $id;
        $image->image = $url;

        $image->save();
    }

    public function deleteImage($product_id, $image_id)
    {
        $image = ProductImage::find($image_id);

        if(!is_null($image))
        {
            $url = $image->image;

            $this->UnlinkFile($url);

            $image->delete();

            session()->flash('success', 'Image Deleted');
        }

        return back();
    }

    private function UnlinkFile($path)
    {
        $length = strlen($path);

        $name = substr($path, 1, $length);

        if(file_exists($name))
        {
            unlink($name);
        }
    }
}

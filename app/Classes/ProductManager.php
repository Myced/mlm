<?php

namespace App\Classes;

use App\Functions;
use App\Admin\Product;

class ProductManager
{
    protected $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function saveProduct($request)
    {
        $product  = $this->product;

        //save product properties
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;

        if(empty($request->code))
        {
            $product->code = $this->generateProductCode();
        }
        else {
            $product->code = $request->code;
        }

        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->cost_price = Functions::getMoney($request->cost_price);
        $product->price = Functions::getMoney($request->price);
        $product->quantity = $request->quantity;
        $product->published = isset($request->published) ? true : false;
        $product->description = $request->description;
        $product->description_long = $request->description_long;
        $product->specifications = $request->specifications;
        $product->tags = $request->tags;

        if(!empty($request->tiny))
        {
            $product->tiny_image = $this->uploadImage($request->tiny, Product::TINY_IMAGE_PATH);
        }

        if(!empty($request->thumbnail))
        {
            $product->thumbnail = $this->uploadImage($request->thumbnail, Product::THUMBNAIL_PATH);
        }

        if(!empty($request->image))
        {
            $product->image = $this->uploadImage($request->image, Product::IMAGE_PATH);
        }

        $product->save();

        return $product;
    }

    private function generateProductCode()
    {
        $id = Product::orderBy('id', 'desc')->first()->id;

        $code = $this->createCode(++$id);

        return $code;
    }

    private function createCode($id)
    {
        $constant = "PDT.";

        if($id < 10)
        {
            $zeros = '000';
        }
        elseif($id < 100)
        {
            $zeros = '00';
        }
        elseif($id < 10)
        {
            $zeros = '0';
        }
        else {
            $zeros = '';
        }

        $code = $constant . $zeros . $id;

        if(!$this->codeExists($code))
        {
            return $code;
        }
        else {
            do {
                ++$id;

                $code = $constant . $zeros . $id;

            } while ($this->codeExists($code));

            return $code;
        }
    }

    private function codeExists($code)
    {
        $product = Product::where('code', '=', $code)->first();

        if(is_null($product))
        {
            return false;
        }

        return true;
    }

    private function uploadImage($file, $path)
    {
        $name = time() . $file->getClientOriginalName();

        $file->move($path, $name);

        return '/' . $path . $name;
    }
}
?>

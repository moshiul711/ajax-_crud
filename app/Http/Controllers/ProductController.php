<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product');
    }

    public function addProduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required'
            ],
            [
                'name.required'=>'Name is Required',
                'name.unique'=>'Product Already Exists',
                'price.required'=>'Price is required'
            ]
        );
        $product = Product::storeProduct($request);
        return response(['status'=>'Product Add Successfully']);
    }
}

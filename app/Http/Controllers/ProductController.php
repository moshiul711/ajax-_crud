<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->latest()->get();
        return view('product', ['products'=>$products]);
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

    public function updateProduct(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products,name,'.$request->id,
                'price' => 'required'
            ],
            [
                'name.required'=>'Name is Required',
                'name.unique'=>'Product Already Exists',
                'price.required'=>'Price is required'
            ]
        );
        $product = DB::table('products')->where('id','=',$request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return response(['status'=>'Product Updated Successfully']);
    }

    public function deleteProduct()
    {
        $product = DB::table('products')->where('id','=',$_GET['id'])->delete();
        return response(['status'=>'Product Deleted Successfully']);
    }
}

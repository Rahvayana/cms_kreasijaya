<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['products']=Product::all();
        return view('product.index',$data);
    }

    public function add()
    {
        return view('product.add');
    }

    public function save(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);
        $product=new Product();
        $product->name=$request->name;
        $product->satuan=$request->satuan;
        $product->harga=$request->harga;
        $product->save();
        return redirect()->route('pos.product');

    }
}

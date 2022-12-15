<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function index()
    {
        return view('pos.point-of-sale');
    }

    public function product($query)
    {
        $products=DB::table('products')->where('name','LIKE','%'.$query.'%')->get();
        return response()->json($products);
    }

    public function save(Request $request)
    {
        dd($request);
    }
}

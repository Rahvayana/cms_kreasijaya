<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function category()
    {
        $data['categories']=Category::all();
        return view('setting.category',$data);
    }

    public function addCategory(Request $request)
    {
        $category= new Category();
        $category->name=$request->nama_kategori;
        $category->save();
        return redirect()->route('setting.category');

    }
}

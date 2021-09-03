<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    public function index()
    {
        $data['portfolios']=DB::table('portfolios')->select('portfolios.*','categories.name as kategori')
        ->leftJoin('categories','categories.id','portfolios.category_id')
        ->get();
        // dd($data);
        return view('portfolio.index',$data) ;
    }

    public function add()
    {
        $data['categories']=Category::all();
        return view('portfolio.add',$data);
    }

    public function store(Request $request)
    {
        // dd($request);
        $i=1;
        foreach($request->files as $file){
            $fileName=time().$i.'.'.$file->getClientOriginalExtension();
            if ($request->file('image'.$i)) {
                $path = public_path().'/images/portfolio';
                $file->move($path,$fileName);
            }
            $images[]=$fileName;
            $i++;
        }
        $portfolio = new Portfolio();
        $portfolio->category_id=$request->kategori;
        $portfolio->title=$request->project_name;
        $portfolio->client=$request->client;
        $portfolio->start=$request->start;
        $portfolio->url=$request->url;
        $portfolio->tags=$request->tags;
        $portfolio->description=$request->project_description;
        $portfolio->image=json_encode($images);
        $portfolio->save();
        return redirect()->route('portfolio.index');
    }
}

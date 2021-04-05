<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function create()


    {   $user=Auth::user()->isadmin;
        if($user){
        return view('category.create');}
        else{
            return redirect()->route('dashboard')->with('error','you cant add category');
        }

    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required',
            
        ]);
        $category=new Category();
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->save();
        return redirect()->route('dashboard')->with('success_message',"دسته اضافه شد");
        
    }



}


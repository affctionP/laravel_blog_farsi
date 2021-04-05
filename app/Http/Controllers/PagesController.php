<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PagesController extends Controller
{
   
   
    public function index()
    {
        $title="welocom to laravel site here is homepage";
        //return view('hello',compact('title'));
        return view('hello')->with('title',$title);


    }
    public function about(){
        return view('about');
    }
    public function service(){
        $data=array(
            'title'=>'SERVICES',
            'services'=> ['web design','django','php','linux']
        );
        return view('services')->with($data);
    }

  
   
}

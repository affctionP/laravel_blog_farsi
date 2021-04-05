<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller

{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {
        
        //$posts=Post::where('title','POst one')->get()
        //$posts=Post::OrderBy('title','desc')->get()
        //$posts=DB::select('SELECT * FROM posts')
        //$posts=Post::OrderBy('title','desc')->()take(1)->get()
        //$posts=Post::OrderBy('title','desc')->paginate(10);
        if(request()->category){
            $categoryname=request()->category;
            $posts=Post::with('category')->whereHas('category',function($query){
                $query->where('slug',request()->category);
            })->get();
        
        }
        else{
            $posts=Post::inRandomOrder()->take(10)->get();
            $categoryname="allofthem";
        }

        $categories=Category::all();
        
        return view('posts.index')->with(['keys'=>$posts,'categories'=>$categories
        ,'categoryname'=>$categoryname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories=Category::all();
        /*$list=array();
        foreach ($categories as $key) {
            
            
           array_push($list,$key->name);
           
        }*/
        
        return view('posts.create')->with(['categories'=>$categories]);
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
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
            'categories_id' => ['required', 'min:1'],
            'categories_id.*' => ['required', 'integer', 'exists:categories,id'],
        ]);
        if($request->hasFile('cover_image')){
            //get image by extention
            $imageWithExe=$request->file('cover_image')->getClientOriginalName();
            //get path image
            $imagePath=pathinfo($imageWithExe,PATHINFO_FILENAME);
            //get extention
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            $filenametostore=$imagePath."_".time().".".$extension;
            $path=$request->file('cover_image')->storeAs('public/cover_image',$filenametostore);



        }else{
            $filenametostore="noimage.jpg";

        }
        $post=new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        
        
        
        $post->user_id=Auth::user()->id;
        //$post->user_id=auth()->user()->id;
        $post->cover_image=$filenametostore;
        
        //$post->category()->attach($request->categories_id);

        $post->save();
        DB::table('category_post')->insert([
            "post_id"=>$post->id,
            "category_id"=>$request->categories_id

        ]);

        return redirect("posts")->with('success','it is done');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        //$comments=Comment::where('post_id',$post->id)->get()->all();
        return view('posts.show')->with(['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    { 
        $categories=Category::all();
        $list=array();
        foreach ($categories as $key) {
            
            
           array_push($list,$key->name);
           
        }
        
        
        $post=Post::find($id);
        if(auth()->user()->id !==$post->user_id){
            return redirect('posts')->with('error','unacssesable for you');
        }
        return view('posts.edit')->with(['post'=>$post,'list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        if($request->hasFile('cover_image')){
            //get image by extention
            $imageWithExe=$request->file('cover_image')->getClientOriginalName();
            //get path image
            $imagePath=pathinfo($imageWithExe,PATHINFO_FILENAME);
            //get extention
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            $filenametostore=$imagePath."_".time().".".$extension;
            $path=$request->file('cover_image')->storeAs('public/cover_image',$filenametostore);
        }

        $post= Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image=$filenametostore;
        }
        $post->save();
        return redirect("posts")->with('success','it is done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id !==$post->user_id){
            return redirect('posts')->with('error','unacssesable for you');
        }
        if($post->cover_image != "noimage.jpg"){
            Storage::delete('public/cover_image'.$post->cover_image);
        }
        $post->delete();
        return redirect("posts")->with('success','it is remove');
        
    }
        
    
}

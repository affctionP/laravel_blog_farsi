@extends('layouts.app')
@section('content')
<h1>ویرایش</h1>

{!! Form::open(['action'=>['App\Http\Controllers\PostController@update',$post->id] ,'method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
   {{Form::label('title','عنوان')}}
   {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'title'])}}
</div>
<div class="form-group">

   {{Form::label('title','دسته')}}
   {{ Form::select('category',$list)}}

</div>
<div class="form-group">
   {{Form::label('body','متن')}}
   {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'body'])}}
</div>
<div class="form-group">
   {{Form::label('image_cover','تصویر')}}
   {{Form::File('cover_image')}}
</div>
{{Form::hidden('_method','PUT')}}
{{Form::submit('submit',['class'=>'btn btn-primary'])}}

    
{!! Form::close() !!}

@endsection
@extends('layouts.app')
@section('content')
<h1>خبر جدید</h1>

{!! Form::open(['action'=>'App\Http\Controllers\PostController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
   {{Form::label('title','عنوان')}}
   {{Form::text('title','',['class'=>'form-control','placeholder'=>'title'])}}
</div>
<div class="form-group">
   <select name="categories_id" multiple>
      @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
      </select>

</div>
<div class="form-group">
   {{Form::label('body','متن خبر')}}
   {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'body'])}}
</div>
<div class="form-group">
   {{Form::label('image_cover','تصویر')}}
   {{Form::File('cover_image')}}
</div>
{{Form::submit('submit',['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!}
@endsection
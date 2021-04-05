@extends('layouts.app');
@section('content')
{!! Form::open(['action'=>'App\Http\Controllers\CategoryController@store','method'=>'POST']) !!}
<div class="form-group">
   {{Form::label('name','نام دسته')}}
   {{Form::text('name','',['class'=>'form-control','placeholder'=>'name'])}}
</div>
<div class="form-group">
    {{Form::label('slug','برچسب')}}
    {{Form::text('slug','',['class'=>'form-control','placeholder'=>'slug'])}}
 </div>

{{Form::submit('submit',['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!}

    
@endsection
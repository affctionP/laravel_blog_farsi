@extends('layouts.app')
@section('extracss')
<style>
.thumb{
    width: 100%;
    height: 200px;

}
</style>
    
@endsection

@section('content')
<br>
<div><a href="{{route('posts.index')}}" class="btn btn-default">Go Back</a></div>
<h1>{{$post->title}}</h1>
<br>


<img  class="thumb"src="{{route('image',$post->cover_image)}}" />

<br>
<div>
{!!$post->body!!}

</div>
<hr>
<small>written at {{$post->created_at}} by {{$post->user->name}}</small>
<br>
@if(!Auth::guest())
@if($post->user_id==Auth::user()->id)
<a href="{{route('posts.edit',$post->id)}}" class="btn btn primary">Edit</a>
{!! Form::open(['action'=>['App\Http\Controllers\PostController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
   {{Form::hidden('_method','DELETE')}}
   {{Form::submit('delete',['class'=>'btn btn-danger'])}}
@endif
@endif
{!! Form::close() !!}
@include('inc.commentDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
<h4>Add comment<h4>
   <form method="post" action="{{ route('comment.store' ) }}">
      @csrf
      <div class="form-group">
          <textarea class="form-control" name="body"></textarea>
          <input type="hidden" name="post_id" value="{{ $post->id }}" />
      </div>
      <div class="form-group">
          <input type="submit" class="btn btn-success" value="Add Comment" />
      </div>
  </form>




@endsection
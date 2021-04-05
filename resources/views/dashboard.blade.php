@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">داشبورد</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}<hr>
                    <a class="btn btn-primary" href="posts/create">خبر جدید</a>
                    @if($user->isadmin)
                    <a class="btn  " style="background-color:rgb(102, 219, 102)" href="{{route('category.create')}}">دسته جدید</a>
                    @endif
                    <h3>اخبار شما </h3>
                    @if(count($posts)>0)
                    <table class="table table-striped">
                    <tr>
                         <th>Title</th>
                         <th></th>
                         <th></th>

                    </tr>
                    @foreach ($posts as $post )
                      <tr>
                         <td>{{$post->title}}</td>
                         <td><a href="posts/{{$post->id}}/edit" class="btn btn-primary">ویرایش</a></td>
                         <td>
                         {!! Form::open(['action'=>['App\Http\Controllers\PostController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
                          {{Form::hidden('_method','DELETE')}}
                          {{Form::submit('حذف',['class'=>'btn btn-danger'])}}
                          {!! Form::close() !!}

                         </td>

                      </tr>
                        
                    @endforeach

                    </table>
                    @else
                     <p>there is no posts yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

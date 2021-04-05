@extends('layouts.app')
@section('extracss')
<style>
  * {
    box-sizing: border-box;
    direction: rtl
    
  }
  
  /* Style the body */
  body {
    
    margin: 0;
    direction: rtl;
  }
  
  /* Header/logo Title */
  .header {
    padding: 80px;
    text-align: center;
    background:mediumorchid;
    color: white;
  }
  
  /* Increase the font size of the heading */
  .header h1 {
    font-size: 40px;
  }
  
  /* Sticky navbar - toggles between relative and fixed, depending on the scroll position. It is positioned relative until a given offset position is met in the viewport - then it "sticks" in place (like position:fixed). The sticky value is not supported in IE or Edge 15 and earlier versions. However, for these versions the navbar will inherit default position */

  
  /* Style the navigation bar links */


  
  /* Change color on hover */

  /* Column container */
  .row {  
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    
    
  }
  
  /* Create two unequal columns that sits next to each other */
  /* Sidebar/left column */
  .side {
    -ms-flex: 30%; /* IE10 */
    flex: 30%;
    background-color: #f8fafc;;
    padding: 20px;
    position: sticky;
    height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 200px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 8%; /* Stay at the top */
  left: 0;
   /* Black */
  
  padding-top: 20px
  }
  
  /* Main column */
  .main {   
    -ms-flex: 70%; /* IE10 */
    flex: 70%;
    background-color: white;
    padding: 20px;
    
    margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
    
    
  }
  
  /* Fake image, just for this example */
  .fakeimg {
    background-color:rgb(176, 119, 214);
    width: 80%;
    border-color: black;

    border-radius: 10%;

    

  }
  .fakeimg img{
    background-size: contain;
    background-repeat: no-repeat;
    height: 100%;
    width: 100%;
    

  }
  

  /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 700px) {
    .row {   
      flex-direction: column;
    }
  }
  
  /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
  @media screen and (max-width: 400px) {
    .navbar a {
      float: none;
      width: 100%;
    }
  }

  .side a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #301a1a;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.side a:hover {
  color: #f1f1f1;
}

 </style>   
@endsection

@section('content')

<div class="row">
  <div class="side">
    <h2 style="text-align:center">دسته ها</h2>

    @foreach ($categories as $category )
    <div class="fakeimg" style="height:60px;"><a href="{{route('posts.index',['category'=>$category->slug])}}">{{$category->name}}</a></div><br>
    @endforeach
  </div>
  @if (count($keys)>0)
  @foreach ($keys as $p)
  
  <div class="main">
    <h2><a href="{{route('posts.show',$p->id)}}">{{$p->title}}</a></h2>
    <h5>نوشته شده در {{$p->created_at}}</h5>
    <div class="fakeimg" style="height:200px;"><img src="storage/cover_image/{{$p->cover_image}}"/></div>
    <p>نویسنده:{{$p->user->name}}</p>
  
    <br>
    
  </div>
  
  @endforeach
  @else
  <p>no post</p>
  @endif
</div>
@endsection
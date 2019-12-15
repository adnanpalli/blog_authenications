@extends('main')
@section('title','| home')
@section('stylesheets')
  {!! Html::style('css/style.css') !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1 style="text-align:center " >
          WWW.<span style="color:green">BATO</span><span style="color:blue">APNA</span><span style="color:tomato">GYAN</span>.COM</h1>
        <!--
        <p>...</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        -->
      </div>
    </div>
    <div class="col-md-8">
      <!--NEW COMMENT ADDED-->
        @foreach($posts as $post)
        <div class="post">
          <h2>{{  $post->title }}</h2>
           <p>{!! substr(strip_tags($post->body),0,250)  !!}............</p>
          <a href="{{ route('blog.view',$post->slug)}}" > Read more..</a>
          <p class="created"> Created At : {{ $post->created_at }} </p>
         </div>
         <hr>
       @endforeach
     
    </div>
    <div class="col-md-3">
      <h2 align="center">All Categories</h2>
      <br>
      @foreach($catgories as $category)
        <div class="post">
          <a align="center" href=" {{ route( 'blog.shows',$category->id) }}"> {{ $category->title }} </a>
          
         </div>
         <hr>
       @endforeach
    </div>
  </div>

  @endsection

  
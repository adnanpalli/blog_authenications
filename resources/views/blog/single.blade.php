@extends('main')
@section('title',"| $post->title ")

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>{{$post->title}}</h1>
		<p class="lead">{{$post->body}}</p>
		<b> created at : {{ date('d M Y h:ia',strtotime($post->created_at)) }} <br>
		<b> updated at : {{ date('d M Y h:ia',strtotime($post->updated_at)) }} <br>
		
	</div>
	
</div>

@endsection
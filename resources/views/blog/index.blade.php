@extends('main')
@section('title',"| Popular post ")

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Blog</h1>
	</div>
	<div class="col-md-8 col-md-offset-2">
		@foreach($posts as $post)
		<div class="post">
		<h3>{{$post->title}}</h3>
		<p>{{ substr($post->body,0,250)}} {{ strlen($post->body)>250 ? ".....":"" }}</p>
		<b> created at : {{ date('d M Y h:ia',strtotime($post->created_at)) }} </b><br>
		 <?php
               echo link_to_route('blog.view', $title = 'show more', $parameters = [$post->slug], $attributes = ['class'=>'btn btn-primary']); ?>
               <hr>
		</div>
		@endforeach
		
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-6">
	 {!! $posts->links() !!}
	</div>
</div>
@endsection
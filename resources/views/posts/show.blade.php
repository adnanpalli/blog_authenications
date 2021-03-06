@extends('main')
@section('title','| Create Post')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{$post->title}}</h1>
		@if(isset($post->image))
			<img src ="{{ asset('images/'.$post->image) }}">
		@endif
		<p class="lead">{!! $post->body !!}</p>

		<b> created at : {{ $post->created_at}}

		<hr>
		<div class="tag">
			@foreach($post->tags as $tag)
			<span class="badge"> {{ $tag->name }}</span>
			@endforeach
		</div>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>My Role : </label>
				@foreach ($user->roles as $role) 
             		{{ $role->name  }}
        	 @endforeach
			</dl>
			<dl class="dl-horizontal">
				<label>Author : </label>
				<b> {{ $post->user->name }} </b>
			</dl>
			<dl class="dl-horizontal">
				<label>Author email: </label>
				<b> {{ $post->user->email }} </b>
			</dl>
			<dl class="dl-horizontal">
				<label>Slug </label>
				<p><a href="{{ url('blog/'.$post->slug) }}">{{ url($post->slug) }} </a> </p>
			</dl>	
			<dl class="dl-horizontal">
				<label>category: </label>
				<p>{{ $post->category->title }} </p>
			</dl>	
			<dl class="dl-horizontal">
				<label>Created at: </label>
				<p>{{ date('F d Y h:ia',strtotime($post->created_at)) }} </p>
			</dl>	
			<dl class="dl-horizontal">
				<label>Updated at: </label>
				<p>{{ date('F d Y h:ia',strtotime($post->updated_at)) }} </p>
			</dl>	
		
			<div class="row">
			<div class="col-md-4">
			<?php
				echo link_to_route('post.edit', $title = 'Edit', $parameters = [$post->id], $attributes = ['class'=>'btn btn-primary btn-block']); ?>
				
			</div>
			<div class="col-md-4">
			

				{!! Form::open(['route' => ['post.destroy',$post->id], 'method' => 'delete']) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
				{!! Form::close() !!}
			</div>
			<div class="col-md-4">
			<?php
				if($post->status==0)
				{
				echo link_to_route('post.publish', $title = 'Publish', $parameters = [$post->id], $attributes = ['class'=>'btn btn-info btn-block']); 
				}
				else{
					echo link_to_route('post.unpublish', $title = 'Unpublish', $parameters = [$post->id], $attributes = ['class'=>'btn btn-info btn-block']); 
				}

					?>
				
			</div>

			</div>	
			<div class="row" style="margin-top:5px">
				<div class="col-md-12">
					<?php
				echo link_to_route('post.index', $title = '<< Show All Posts', $parameters = [], $attributes = ['class'=>'btn btn-primary btn-block']); ?>
				
				</div>
			</div>
			</div>
		</div>
	</div>
</div>

@endsection
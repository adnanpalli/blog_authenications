@extends('main')
@section('title','| Create Post')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1 class="text-primary">{{$post->title}}</h1>
		<p class="text-primary">{{$post->body}}</p>
		<b> created at : {{ $post->created_at}}
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created at: </dt>
				<dd>{{ date('F d Y h:ia',strtotime($post->created_at)) }} </dd>
			</dl>	
			<dl class="dl-horizontal">
				<dt>Updated at: </dt>
				<dd>{{ date('F d Y h:ia',strtotime($post->updated_at)) }} </dd>
			</dl>	
		
			<div class="row">
			<div class="col-md-6">
			<?php
				echo link_to_route('post.edit', $title = 'Edit', $parameters = [$post->id], $attributes = ['class'=>'btn btn-primary btn-block']); ?>
				
			</div>
			<div class="col-md-6">
			

				{!! Form::open(['route' => ['post.destroy',$post->id], 'method' => 'delete']) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
				{!! Form::close() !!}
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
@extends('main')
@section('title','| Create Post')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{$cat->title}}</h1>
		<b> created at : {{ $cat->created_at}}
	</div>
	<div class="col-md-4">
		<div class="well">	
			<dl class="dl-horizontal">
				<label>Created at: </label>
				<p>{{ date('F d Y h:ia',strtotime($cat->created_at)) }} </p>
			</dl>	
			<dl class="dl-horizontal">
				<label>Updated at: </label>
				<p>{{ date('F d Y h:ia',strtotime($cat->updated_at)) }} </p>
			</dl>	
		
			<div class="row">
			<div class="col-md-6">
			<?php
				echo link_to_route('category.edit', $title = 'Edit', $parameters = [$cat->id], $attributes = ['class'=>'btn btn-primary btn-block']); ?>
				
			</div>
			<div class="col-md-6">
			

				{!! Form::open(['route' => ['category.destroy',$cat->id], 'method' => 'delete']) !!}
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
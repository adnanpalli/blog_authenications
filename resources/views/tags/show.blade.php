@extends('main')
@section('title','| Create Post')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Tag : {{$tag->name}} <span class="badge"> {{ $tag->posts()->count() }} posts </span></h1>
		<div>
			<table class="table">
				<thead>
					<tr>
						<th>Post</th>
						<th>Tags</th>
					</tr>
				</thead>
				@foreach($tag->posts as $post)
				<tbody>
					<tr>
						<td>{{$post->title }}</td>
						<td>
						@foreach($post->tags as $othertag)
						
							<span class="badge">{{ $othertag->name }}</span>
						
						@endforeach
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
	<div class="col-md-4">
		<div class="well">	
			<dl class="dl-horizontal">
				<label>Created at: </label>
				<p>{{ date('F d Y h:ia',strtotime($tag->created_at)) }} </p>
			</dl>	
			<dl class="dl-horizontal">
				<label>Updated at: </label>
				<p>{{ date('F d Y h:ia',strtotime($tag->updated_at)) }} </p>
			</dl>	
		
			<div class="row">
			<div class="col-md-6">
			<?php

				echo link_to_route('tag.edit', $title = 'Edit', $parameters = [$tag->id], $attributes = ['class'=>'btn btn-primary btn-block']); ?>
				
			</div>
			<div class="col-md-6">
			

				
			</div>
			</div>	
			</div>
		</div>
	</div>
</div>

@endsection
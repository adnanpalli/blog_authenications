@extends('main')
@section('title',"| $post->title ")
@section('stylesheets')
	{!! Html::style('css/style.css') !!}
@endsection
@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>{{$post->title}}</h1>
		<p class="lead">{!!$post->body !!}</p>
		<div class="dates_created">
		<p> created at : {{ date('d M Y h:ia',strtotime($post->created_at)) }}
		</p>
		<p> updated at : {{ date('d M Y h:ia',strtotime($post->updated_at)) }}
		</p>
		</div>
		<p class="cats">Category : {{ $post->category->title }} </p>
		<hr>
	</div>
	
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3 class="comment-title">{{ $post->comment()->count() }} Comments</h3>
			@foreach($post->comment as $comment)
			<div class="comment">
			<div class="author-info">
				<img class="comment-person_img img-rounded" src="">
				<div class="comment-person">
					<h4>{{ $comment->name }}</h4>
				
				<p class="created">{{ $comment->created_at }}</p>
				</div>
			</div>
			<div class="comment-content">
				<p>{{ $comment->comment }}</p>
			</div>
			<hr>
		</div>
			@endforeach
	</div>
	
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="form">
			{!! Form::open(['route' =>['comment.save',$post->id],'method'=>'POST']) !!}
		
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name') }}
					{{ Form::text('name',null,['class'=>'form-control']) }}
				</div>
				<div class="col-md-6">
					{{ Form::label('email') }}
					{{ Form::text('email',null,['class'=>'form-control']) }}
				</div>

				
			</div>
			<div class="row">
				<div class="col-md-12">
					{{ Form::label('comment') }}
					{{ Form::textarea('comment',null,['class'=>'form-control','rows'=>5]) }}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					{{ Form::submit('Add comment',['class'=>'btn btn-block btn-success','style'=>'margin-top:10px']) }}
				</div>
			</div>
			{!! Form::close() !!}
	</div>
</div>
	
</div>
@endsection
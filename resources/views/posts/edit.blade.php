@extends('main')
@section('title','| Edit Post')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Edit post</h1>
     
        {{ Form::open(array('method'=>'PUT','route' => ['post.update', $post->id,'data-parsley-validate'=>''])) }}
      	
    		
    		{{ Form::label('title', 'Title') }}
    		{{ Form::text('title',$post->title,array('class'=>'form-control','data-parsley-required'=>'','maxlength'=>'255')) }}

        {{ Form::label('slug', 'Slug') }}
        {{ Form::text('slug',null,array('class'=>'form-control','data-parsley-required'=>'','maxlength'=>'255')) }}

        {{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id',$categories,null,array('class'=>'form-control')) }}

        {{ Form::label('tags', 'Tags') }}
        {{ Form::select('tags[]',$tags,null,array('class'=>'form-control basic-multiple',
        'multiple'=>'multiple')) }}        

    		{{ Form::label('body', 'Post Body') }}
    		{{ Form::textarea('body',$post->body,array('class'=>'form-control','data-parsley-required'=>'')) }}

    		{{ Form::submit('Update post',array('class'=>'btn btn-success btn-block','style'=>'margin-top:20px'))}}
		{!! Form::close() !!}
    </div>
  </div>


@endsection  
@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    
    $('.basic-multiple').select2();
@endsection
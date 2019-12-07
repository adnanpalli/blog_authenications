@extends('main')
@section('title','| Create Post')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
     

      	{!! Form::open(['route' => 'post.store','data-parsley-validate'=>'']) !!}
    		
    		{{ Form::label('title', 'Title') }}
    		{{ Form::text('title',null,array('class'=>'form-control','data-parsley-required'=>'','maxlength'=>'255')) }}

        {{ Form::label('category_id', 'Category') }}
        <select class="form-control" name="category_id" data-parsley-required=""> 
          @foreach($categories as $category)
          <option value='{{ $category->id }}'>{{ $category->title }}</option>
          @endforeach
        </select>

         {{ Form::label('tags', 'Tag') }}
        <select class="form-control basic-multiple" name="tags[]" multiple="multiple"> 
          @foreach($tags as $tag)
          <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
          @endforeach
        </select>


        {{ Form::label('slug', 'Slug') }}
        {{ Form::text('slug',null,array('class'=>'form-control','data-parsley-required'=>'','maxlength'=>'255','minlength'=>'5')) }}

    		{{ Form::label('body', 'Post Body') }}
    		{{ Form::textarea('body',null,array('class=form-control','data-parsley-required'=>'')) }}

       

    		{{ Form::submit('Save post',array('class'=>'btn btn-success btn-block','style'=>'margin-top:20px'))}}
		{!! Form::close() !!}
    </div>
  </div>


@endsection  
@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
    
    $('.basic-multiple').select2();
  </script>
@endsection
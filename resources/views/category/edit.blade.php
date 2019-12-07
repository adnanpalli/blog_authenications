@extends('main')
@section('title','| Edit Category')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Edit Category</h1>
     
        {{ Form::open(array('method'=>'PUT','route' => ['category.update', $category->id,'data-parsley-validate'=>''])) }}
      	
    		{{ Form::label('title', 'Title') }}
    		{{ Form::text('title',$category->title,array('class'=>'form-control','data-parsley-required'=>'','maxlength'=>'255')) }}

    		{{ Form::submit('Update category',array('class'=>'btn btn-success btn-block','style'=>'margin-top:20px'))}}
		{!! Form::close() !!}
    </div>
  </div>

@endsection  
@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection
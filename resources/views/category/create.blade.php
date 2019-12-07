@extends('main')
@section('title','| Create Category')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create Category</h1>
     

      	{!! Form::open(['route' => 'category.store','data-parsley-validate'=>'']) !!}
    		
    		{{ Form::label('title', 'Title') }}
    		{{ Form::text('title',null,array('class'=>'form-control','data-parsley-required'=>'','maxlength'=>'255')) }}

        
    		{{ Form::submit('Save post',array('class'=>'btn btn-success btn-block','style'=>'margin-top:20px'))}}
		{!! Form::close() !!}
    </div>
  </div>


@endsection  
@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection
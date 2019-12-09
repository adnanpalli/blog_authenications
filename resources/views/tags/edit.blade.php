@extends('main')
@section('title','| Edit Tags')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Edit Tag</h1>
     
        {{ Form::open(array('method'=>'PUT','route' => ['tag.update', 
        $tag->id])) }}
      	
    		{{ Form::label('name', 'Name') }}
    		{{ Form::text('name',$tag->name,array('class'=>'form-control','maxlength'=>'255')) }}

    		{{ Form::submit('Update Tag',array('class'=>'btn btn-success btn-block','style'=>'margin-top:20px'))}}
		{!! Form::close() !!}
    </div>
  </div>

@endsection  
@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection
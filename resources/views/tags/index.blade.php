@extends('main')
@section('title','| Tags')

@section('content')
  <div class="row">

    <div class="col-md-9">
      <h1>All Tags</h1>
     <div class="post">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>Delete</th>
          </thead>
          
          <tbody>
          @foreach($tags as $tag)
            <tr>
            <td>{{ $tag->id }} </td> 
            <td><a href="{{ route('tag.show',$tag->id)}}">{{ $tag->name }} </a></td> 
          
            <td>
              {!! Form::open(['route' => ['tag.destroy',$tag->id], 'method' => 'delete']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}

            </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        
    </div>
     
    </div>
    <div class="col-md-3">
      <div class="well">
      <h3 align="center">Create Tag</h3><br>
        {!! Form::open(['route' => 'tag.store','data-parsley-validate'=>'']) !!}

       
        {{ Form::text('title',null,array('class'=>'form-control','data-parsley-required'=>'','maxlength'=>'255', 'placeholder'=>'Enter tag')) }}


        {{ Form::submit('Save tag',array('class'=>'btn btn-success btn-block','style'=>'margin-top:20px'))}}
        {!! Form::close() !!}
    </div>
    </div>
  </div>

  @endsection
@extends('main')
@section('title','| Category')

@section('content')
  <div class="row">

    <div class="col-md-9">
      <h1>All Category</h1>
     <div class="post">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Title</th>
            
            <th>EDIT</th>
            <th>DELETE</th>
          </thead>
          
          <tbody>
          @foreach($category as $cat)
            <tr>
            <td>{{ $cat->id }} </td> 
            <td>{{ $cat->title }} </td> 
            
            
            <td><a href="{{ route('category.edit',$cat->id) }}" class="btn btn-primary ">Edit </a> </td>
            <td>
              {!! Form::open(['route' => ['category.destroy',$cat->id], 'method' => 'delete']) !!}
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
      <h3 align="center">Create Category</h3><br>
        {!! Form::open(['route' => 'category.store','data-parsley-validate'=>'']) !!}

       
        {{ Form::text('title',null,array('class'=>'form-control','data-parsley-required'=>'','maxlength'=>'255', 'placeholder'=>'Enter Category')) }}


        {{ Form::submit('Save category',array('class'=>'btn btn-success btn-block','style'=>'margin-top:20px'))}}
        {!! Form::close() !!}
    </div>
    </div>
  </div>

  @endsection
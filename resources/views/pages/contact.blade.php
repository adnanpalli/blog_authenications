@extends('main')
@section('title','| Contact me')
@section('content')
  
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 align="center">Contact Me</h1>     
<form class="form-horizontal" action="{{ url('contact')}}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Name:</label>
    <div class="col-sm-10">
      <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10"> 
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="message">Message:</label>
    <div class="col-sm-10"> 
      <textarea id="message" name="message" class="form-control" >Enter your message here....
      </textarea>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
      
    </div>
  </div>
  @endsection
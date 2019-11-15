@extends('main')
@section('title','| Contact me')
@section('content')
  <h1>Contact Me</h1>
  <div class="row">
    <div class="col-md-8">
      
        
          <form action="">
            <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
            <label for="subject">Message:</label>
            <input type="text" class="form-control" id="subject">
            </div>
            <div class="form-group">
            <label for="body">Body:</label>
            <textarea type="text" class="form-control" id="body"></textarea>
            </div>
            
          <input type="submit" class="btn btn-primary" value="submit">
          </form>
        <!--
        <p>...</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        -->
      
    </div>
    <div class="col-md-4">
      <h1> Adress </h1>
      <p class="text-info">my address </p>
    </div>
  </div>
  @endsection
@extends('main')
@section('title','| Admin Dashboard')
@section('content')
@section('content')
@guest
                          
@else
 <h1>Welcome to admin dash board : {{ Auth::user()->name }}</h1> 
@endguest
  <div class="row">
    <div class="col-md-8">
       <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
    </div>
  </div>
  @endsection



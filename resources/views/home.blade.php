@extends('main')
@section('title','| Dashboard')
@section('content')
@section('content')
@guest
                          
@else
 <h1>Welcome {{ Auth::user()->name }}</h1> 
@endguest
  
  <div class="row">
    <div class="col-md-8">
       <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
                                    </a>
                    You are logged in!
                </div>
            </div>
    
      
    </div>
  </div>
  @endsection



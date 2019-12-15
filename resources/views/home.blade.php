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

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 align="center">MY POST</h1>
     <div class="post">
        <table class="table table-bordered">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>view</th>
            <th>edit</th>
          </thead>
          
          <tbody>
          @foreach($posts as $post)
            <tr>
            <td>{{ $post->id }} </td> 
            <td>{{ $post->title }} </td> 
             <td> <?php
               echo link_to_route('post.show', $title = 'view', $parameters = [$post->id], $attributes = []); ?>
            </td>
            <td><?php
                echo link_to_route('post.edit', $title = 'Edit', $parameters = [$post->id], $attributes = []); ?></td>
            </tr>
          </tbody>
          @endforeach
        </table>
    </div>
     
    </div>
  </div>
  @endsection



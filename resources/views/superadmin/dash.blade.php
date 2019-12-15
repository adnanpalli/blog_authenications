@extends('main')
@section('title','| Super Admin Dashboard')
@section('content')
@section('content')
@guest         
@else
 
@endguest

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">{{ strtoupper(Auth::user()->name)."'S POST" }} ( {{ $myposts->count() }} )<span class="glyphicon glyphicon-bullhorn" aria-hidden="true" align="right"></span></h3>
  </div>
  <div class="panel-body">
  <div class="row">
    <div class="col-md-12">
      
     <div class="post">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>view</th>
            <th>edit</th>
          </thead>
          
          <tbody>
          @foreach($myposts as $post)
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

   </div>
  <div class="panel-footer"></div>
</div>

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">OTHER'S POST ( {{ $othersposts->count() }} )
      <span class="glyphicon glyphicon-bullhorn" aria-hidden="true" align="right"></span></h3>
  </div>
  <div class="panel-body">
  <div class="row">
    <div class="col-md-12">
     <div class="post">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>view</th>
            <th>edit</th>
          </thead>
          
          <tbody>
          @foreach($othersposts as $post)
            <tr>
            <td>{{ $post->id }} </td> 
            <td>{{ $post->title }} </td> 
            @if($post->status == 0)
            <td>Not Published</td>
            @else
            <td>Published</td>
            @endif
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
     </div>
  <div class="panel-footer"></div>
</div>
  @endsection




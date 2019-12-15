@extends('main')
@section('title','| index')

@section('content')
  <div class="row">

    <div class="col-md-10">
      <h1>All Post</h1>
     <div class="post">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Title</th>
            
             <th>status</th>
            <th>view</th>
            <th>edit</th>
          </thead>
          
          <tbody>
          @foreach($posts as $post)
            <tr>
            <td>{{ $post->id }} </td> 
            
            <td>{{ $post->title }}</td>
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
        <div class="text-center">
         <p> Page number :  {!!  $posts->currentPage() !!} </p>
          Showing {!!  $posts->count() !!} records out of {!!  $postss->count() !!} Record
          {!! $posts->links() !!}
          
        </div>
    </div>
     
    </div>
    <div class="col-md-2">
      <a href="{{ route('post.create')}}" class="btn btn-primary btn-block">Create New Post</a>
    </div>
  </div>

  @endsection
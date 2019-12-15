@extends('main')
@section('title','| Category wise blog')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 align="center">CATEGORY : {{$cat->title}}</h1>
		<div>
			<table class="table">
				<thead>
					<tr>
						<th>Post</th>
						<th>Body</th>
					</tr>
				</thead>
				@foreach($cat->posts as $post)
				<tbody>
					<tr>
						@if($post->status==1)
						<td><a href="{{route('blog.view',$post->slug)}}">
							{{ $post->title }}</a></td>
							
						<td><p>{{ substr($post->body,0,50)}}......</p></td>
						@endif
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>	
	</div>


</div>

@endsection
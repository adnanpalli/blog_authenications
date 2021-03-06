@extends('main')
@section('title','| Create Post')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>{{$cat->title}}</h1>
		<b> created at : {{ $cat->created_at}}

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
						<td><a href="{{route('blog.view',$post->slug)}}">
							{{$post->title }}</a></td>
						<td><p>{{ substr($post->body,0,50)}}......</p></td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>	
	</div>


</div>

@endsection
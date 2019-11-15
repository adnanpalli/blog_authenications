@if(Session::has('success'))
<div class="alert alert-success">
  <strong>Success!</strong> {{ Session::get('success') }}
</div>
@endif

 @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
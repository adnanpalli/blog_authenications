<!DOCTYPE html>
<html lang="en">
  @include('partials._head')
  <body>
    @include('partials._nav')

    <div class="container">
    	 @include('partials._message')
      @yield('content')
    @include('partials._footer')
    </div> <!-- contatiner ends -->
    @include('partials._js')
   
  </body>
</html>
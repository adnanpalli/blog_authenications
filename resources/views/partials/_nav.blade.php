<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Laravel Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/')? "active" : "" }}">
        <a href="/">Home <span class="sr-only">(current)</span></a></li>
        <li class="{{ Request::is('about')? "active" : "" }}"><a href="/about">About</a></li>
        <li class="{{ Request::is('contact')? "active" : ""}}"><a href="/contact">Contact</a>

        </li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        @guest
        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
        @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if (Auth::user()->isAdmin())
            <li><a href="{{route('admin') }}"> Dashboard</a></li>
            @endif
            @if (Auth::user()->issuperAdmin())
            <li><a href="{{route('superadmin') }}"> Dashboard</a></li>
            @endif
            @if (Auth::user()->isuser())
            <li><a href="{{route('user') }}"> Dashboard</a></li>
            @endif
            <li><a href="{{route('post.index') }}"> Post</a></li>

            @if (!Auth::user()->isuser())
            <li><a href="{{route('category.index') }}">Category</a> </li>
             <li><a href="{{route('tag.index') }}">Tags</a> </li>
             @endif

            <li role="separator" class="divider"></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
              </a>
            </li>
        @endguest
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="{{ url('/') }}">Wine Log</a></h1>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li><a href="{{ route('wine.index') }}">Wine</a></li>
        <li><a href="{{ route('maker.index') }}">Maker</a></li>
        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
          @if (Route::has('register'))
            <li><a href="{{ route('register') }}">Register</a></li>
          @endif
        @else
          <li class="book-a-table text-center nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">
    <h1 class="logo mr-auto"><a href="/">SIG Hafidz/ah</a></h1>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        @if (Route::has('login'))
        @auth
        <li>
          <a href="{{ url('/') }}">Back</a>
        </li>
        @else
        <li>
          <a href="{{ route('login') }}">Login</a>
        </li>
        @if (Route::has('register'))
        <li>
          <a href="{{ route('register') }}">Register</a>
        </li>
        @endif
        @endauth
        @endif
      </ul>
    </nav>
  </div>
</header>
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="index.html">Wine Log</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="{{ route('wine.index') }}">Wine</a></li>
        <li><a href="{{ route('maker.index') }}">Maker</a></li>
        <li class="book-a-table text-center"><a href="#book-a-table">My page</a></li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->
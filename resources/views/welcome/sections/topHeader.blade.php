<nav class="navbar navbar-expand-lg navbar-light bg-white" id="mainNav">
  <a class="navbar-brand" href="/">
    Community Pulse
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('articles.index') }}">Articles </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Register </a>
      </li>
      @else
      @if(auth()->user()->isAdmin())
       <li class="nav-item dropdown pr-2">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <strong>Admin</strong>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="/admin/articles">All Articles</a>
        </div>
      </li>
      @endif
      <li class="nav-item dropdown pr-2">
       <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
         <img src="{{ auth()->user()->avatar() }}" alt="User Image">
         <strong class="px-2">{{auth()->user()->name }}</strong>
       </a>
       <div class="dropdown-menu dropdown-menu-right">
         <a class="dropdown-item" href="/home">Home</a>
         <a href="" class="dropdown-item">My Articles</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item"  href="{{ route('logout') }}">logout</a>
       </div>
     </li>
     @endguest
   </ul>
 </div>
</nav>
<nav class="navbar navbar-expand-lg">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('profile')}}">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('myorders')}}">My orders<span class="sr-only">(current)</span></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li>
        <form action="/search" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" name="seachword" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </li>

      @if (Auth::user())
        <li class="nav-item">
          <a class="nav-link" href="">{{Auth::user()->name}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li> 
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li> 
      @endif
   
    </ul>
  </div>
</nav>
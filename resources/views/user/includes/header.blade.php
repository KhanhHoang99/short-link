<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('links.index') }}">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="mynavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      @if(auth()->check())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('links.show', ['link' => auth()->id()]) }}">Your Links</a>
        </li>
      @endif
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        @if(auth()->check())
                                          
        
            <li class="nav-item">
              <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
            </li>
            
        @else
            <!-- User is not logged in -->
            <li><a href="{{ route('loginPage') }}">Login</a></li>
        @endif

       
      </ul>
    </div>
  </div>
</nav>

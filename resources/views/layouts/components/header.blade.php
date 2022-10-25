  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="{{route('home')}}">
        <div class="badge bg-success text-wrap" >Market </div> <div class="badge bg-warning text-wrap" >Place</div>
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center">
        @auth
        <a class="text-reset me-3 ml-1" href="{{route('ratings.index')}}">
          <i class="fas fa-star"></i>
          <span class="badge rounded-pill badge-notification bg-danger">{{$count}}</span>
        </a>

        <!-- Notifications -->
        <div class="dropdown">
          <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell"></i>
            
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </div>
        <!-- Avatar -->
        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <li>
              <a class="dropdown-item" href="{{route('profiles.index')}}">My profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('items.index')}}">My Items</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            </li>
            @else
            <a class="btn btn-link px-3 me-2" href="{{route('login')}}">Login</a>
            <a class="btn btn-primary me-3" href="{{route('register')}}">Register</a>

          </ul>
        </div>

      </div>
      @endauth
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
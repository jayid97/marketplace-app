  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="{{route('admin.dashboard')}}">
          Market Place
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.users.index')}}">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.items.index')}}">Items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.ratings.index')}}">Rating</a>
        </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center">
        @auth

        <!-- Avatar -->
        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <li>
              <a class="dropdown-item" href="#">My profile</a>
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

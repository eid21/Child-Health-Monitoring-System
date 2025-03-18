<nav class="app-header navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid">
    <!-- Left Side -->
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list fs-4"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="{{ route('dashboard') }}" class="nav-link text-dark fw-semibold">Home</a>
      </li>
    </ul>

    <!-- Right Side -->
    <ul class="navbar-nav ms-auto gap-3 align-items-center">
    
      <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
          @csrf
        </form>
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
      </li>
       
        
          
        
        <!-- Dropdown Menu -->
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

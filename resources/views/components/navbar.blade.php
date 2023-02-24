  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="nav-icon fas fa-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <span class="dropdown-item dropdown-header">Settings</span>
              <div class="dropdown-divider"></div>
              <form action="{{ route('logout') }}" method="post" class="nav-item">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="nav-icon fas fa-arrow-left mr-2"></i>
                  Logout
                </button>
              </form>
              <div class="dropdown-divider"></div>
            </div>
          </li>

    </ul>
  </nav>
  <!-- /.navbar -->

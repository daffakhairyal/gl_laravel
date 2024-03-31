  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="my-4">
    <!-- Brand Logo -->
    <a href="./dashboard" class="brand-link">
      <img src="{{ asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GENERAL LEDGER</span>
    </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">MENU</li>
          <li class="nav-item">
          <a href="./dashboard" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                General Ledger
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./accounts" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chart of Accounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./petty-cash" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Petty Cash</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./transfer-bank" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transfer Bank</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/simple-table" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Petty Cash</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transfer Bank</p>
                </a>
              </li>
            </ul>
          </li>
        </li>
        @if(auth()->user()->role !== 'User')
          <li class="nav-header">ADMIN</li>
          <li class="nav-item">
            <a href="./division" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Division</p>
            </a>
          </li>
          
<li class="nav-item">
    <a href="./user" class="nav-link">
        <i class="nav-icon fas fa-circle"></i>
        <p>
            User
        </p>
    </a>
</li>
@endif
<li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="nav-link">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Logout
                    </p>
                </button>
            </form>
        </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
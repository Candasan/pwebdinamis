<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('img/LOGO.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" 
           style="opacity: .8">
      <span class="brand-text font-weight-light">UMBJM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('img/user.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-times-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- menu blog -->
          <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fab fa-blogger orange"></i>
                <p>
                  Blog Pages
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="user" class="nav-link">
                      <i class="fas fa-user nav-icon red"></i>
                    <p>User</p>
                  </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="category" class="nav-link">
                      <i class="fas fa-list-alt nav-icon yellow"></i>
                      <p>Category</p>
                    </router-link>
                  </li>
                <li class="nav-item">
                  <router-link to="tambah-blog" class="nav-link ">
                    <i class="fas fa-folder-plus nav-icon teal"></i>
                    <p>Add Blog</p>
                  </router-link>
                </li>
                
                <li class="nav-item">
                  <router-link to="data-blog" class="nav-link">
                    <i class="fas fa-database nav-icon cyan"></i>
                    <p>Blog Data</p>
                  </router-link>
                </li>
                
              </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Simple Link
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{url('/masuk')}}" class="nav-link">
                    <p>Login</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
                  </a>
              </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
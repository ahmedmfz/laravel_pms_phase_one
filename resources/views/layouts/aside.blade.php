<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/')}}" class="brand-link">
        <img src="{{ asset('assets/dist/img/3d-printing-software.png')}}" alt="PMS Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
        <span class="brand-text font-weight-light">PMS Project</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('assets/dist/img/user8-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{url('/users/'.Auth::user()->id)}}" class="d-block">
            {{ Auth::user()-> first_name}}
            {{ Auth::user()-> last_name}}
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                <i class="nav-icon far fa-list-alt"></i>
                <p>
                  categories
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/categories/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>add category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/categories')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>show categories</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  products
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/products/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>add product</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/products')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>show products</p>
                  </a>
                </li>
              </ul>
            </li>

            @if(Auth::user()->type != 'admin')
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  users
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/users/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>add user</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/users')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>show users</p>
                  </a>
                </li>
              </ul>
            </li>
            @endif
            
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
                <i class="nav-icon  fas fa-file-alt "></i>
                <p>
                  orders
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/orders')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>show orders</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
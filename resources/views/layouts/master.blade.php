<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Home</title>
  @include('layouts.head')
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('/')}}" class="nav-link">Home</a>
        </li>
      </ul>

    
      <div class="dropdown show ml-auto">

      <div class="icon d-inline mt-2">
        <a href="{{ url('/cart')}}"><i class="fas fa-shopping-cart"></i></a>
          <span class="badge bg-secondary">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
      </div>

        <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()-> first_name}}
          {{ Auth::user()-> last_name}}
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>

    </nav>
    <!-- /.navbar -->

    @include('layouts.aside')

    <!-- content pages -->
    @yield('content')
    <!-- /.content pages -->



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <div class="text-center">
        <strong>Copyright &copy; 2021 <a href="#">Ahmed Mahfouz</a>.</strong> All rights reserved.
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('assets/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>

  @yield('js')
</body>

</html>
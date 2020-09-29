<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sofra Control-Panal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('dist/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="hold-transition sidebar-mini">


<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url(route('home'))}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sofra</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->photo}}" style="width: 50px; height: 50px;" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="width: 150px; ">
          <a href="#" class="d-block mt-1" style=" font-size: 20px;"> {{auth()->user()->name}} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview">
            <a href="{{url('/home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> -->
      <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Posts
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{url(route('users.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('chang-password'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Chang Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('clients.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Clients</p>
            </a>
            <li class="nav-item">
            <a href="{{url(route('role.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Roles</p>
            </a>
          </li><li class="nav-item">
            <a href="{{url(route('restaurants.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Restaurants</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('categories.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('cities.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Cities</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('regions.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Regions</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('orders.index'))}}" class="nav-link">  
              <i class="nav-icon fas fa-file"></i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('offers.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Offers</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('contacts.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Contacts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('payments.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Payment Method</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('settings.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Settings</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('logout'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>=-
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1>@yield('page_title')</h1>
              </div>
            </div>  
        </section>

    @yield('content')

   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <!--<b>Version</b> 3.0.2 -->
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('dist/plugins/jquery/jquery.min.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


@stack('scripts')
</body>
</html>

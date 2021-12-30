@extends('layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">profile Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">User Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="text-secondary">USER Profile</h1>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-3 mx-auto">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/dist/img/user8-128x128.jpg')}}" alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">
            {{ Auth::user()-> first_name}}
            {{ Auth::user()-> last_name}}
          </h3>

          <p class="text-muted text-center">{{ Auth::user()-> type}}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>email</b> <a class="float-right">{{ Auth::user()-> email}}</a>
            </li>
            <li class="list-group-item">
              <b>address</b> <a class="float-right">Dokki</a>
            </li>
            <li class="list-group-item">
              <b>Birthdata</b> <a class="float-right">11/11/2020</a>
            </li>
          </ul>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
  </div>
</div>

</div>



@endsection
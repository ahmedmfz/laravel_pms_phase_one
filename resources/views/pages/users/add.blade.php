@extends('layouts.master')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Users Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Add user</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-2">
        <h1 class="text-secondary"> Add users</h1>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add user </h3>
            </div><!-- /.card-header -->

            @include('layouts.message')
            <!-- form start -->
            <form role="form" action="{{ url('users') }}" method="POST">
              @csrf

              <div class="card-body">

                <div class="form-group">

                  <label for="first_name" class="col-form-label text-md-right">{{ __('First Name') }}</label>

                  <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="Enter first name" autofocus>

                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div> <!-- /end first name  -->

                <div class="form-group">

                  <label for="last_name" class=" col-form-label text-md-right">{{ __('Last Name') }}</label>

                  <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Enter last name" autofocus>

                  @error('last_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div><!-- /end last name  -->

                <div class="form-group">

                  <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div><!-- /end email  -->

                <div class="form-group">
                  <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>


                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div><!-- /end password  -->

                <div class="form-group">
                  <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter confirm Password">

                </div><!-- /end confirmed password  -->

                <div class="form-group">
                  <label for="type" class=" col-form-label text-md-right">{{ __('Type') }}</label>

                  <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>
                    <option value="empty" disabled selected> --- </option>
                    <option value="owner">owner</option>
                    <option value="super_admin">Super_Admin</option>
                    <option value="admin">Admin</option>
                  </select>

                  @error('type')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                </div><!-- /endtype  -->

              </div><!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div><!-- /.card footer-->

            </form><!-- /.form -->

          </div><!-- /.card -->

        </div><!--/.col (left) -->
        
      </div><!-- /.row -->

    </div><!-- /.container-fluid -->
    
  </section>

</div><!-- /.content-wrapper -->


@endsection
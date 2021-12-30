@extends('layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Categories Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">update category</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-2">
        <h1 class="text-secondary"> update categories </h1>
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
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">update category </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              
            <form role="form" action="{{ url('categories/'.$data->id)}}" method="POST">
              @csrf
              @method('PUT')
              
              <div class="card-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="{{$data->name}}"  placeholder="Enter category name">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" placeholder="Description of category"
                  name="description">{{$data->description}}</textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit"  class="btn btn-warning">update</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
<!-- /.content-wrapper -->


@endsection
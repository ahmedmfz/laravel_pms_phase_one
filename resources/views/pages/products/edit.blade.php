@extends('layouts.master')


@section('content')

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">products Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">update product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-2">
        <h1 class="text-secondary"> update products</h1>
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
              <h3 class="card-title">update product </h3>
            </div>
            <!-- /.card-header -->
           
         <!-- form start -->
         <form role="form" action="{{ url('products/'.$data->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="card-body">

              <div class="form-group">
                  <label>Category</label>
                  <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">

                    <option value="{{$data->category->id}}" selected readonly>{{$data->category->name}}</option>

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                  </select>
                  @error('category_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div><!-- /.category_id -->

                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{$data->name}}" placeholder="Enter product name">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div><!-- /.name -->

                <div class="form-group">
                  <label >Price</label>
                  <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$data->price}}" placeholder="Enter price">
                  @error('price')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div><!-- /.price -->

                <div class="form-group">
                  <label >Quantity</label>
                  <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{$data->qty}}" placeholder="Enter Quantity">
                  @error('qty')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div><!-- /.quantity -->

                <div class="form-group">
                  <label >Description</label>
                  <textarea name="description" class="form-control" placeholder="Description of product">{{$data->description}}</textarea>
                </div><!-- /.quantity -->

                <div class="form-group">
                  <label >image</label>
                  <div class="image">
                      <input type="file"  class="form-control @error('image') is-invalid @enderror" name="image" >

                      @error('image')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                
                </div><!-- /.image -->
             
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
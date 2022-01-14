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
                        <li class="breadcrumb-item active">Show category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-2">
                <h1 class="text-secondary">All Categories</h1>
            </div>
            @include('layouts.message')
        </div>

        <div class="row">
            <div class="col-lg-12  p-5 bg-light">
            
                    {!! $dataTable->table() !!}

            </div>
                {!! $dataTable->scripts() !!}
        </div>
    </div>
</div>

@endsection



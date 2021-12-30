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
            <div class="col-lg-12">
            @include('layouts.message')

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            @if($data->count() > 0)

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Num_products</th>
                                    <th>Description</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($data as $index => $category)
                                    <tr>
                                    <th scope="row">{{ $index + 1}}</th>
                                        <td>{{ $category->name}}</td>
                                        <td>{{ $category->products->count()}}</td>
                                        <td>{{ $category->description}}</td>
                                        <td>
                                            <a href="{{ url('/categories/'.$category->id.'/edit')}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                            <form action="{{ url('/categories/'.$category->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td>sorry this is no categories records</td>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@endpush
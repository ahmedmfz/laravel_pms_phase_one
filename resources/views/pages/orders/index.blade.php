@extends('layouts.master')


@section('content')

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">orders Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Show order</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-2">
                <h1 class="text-secondary">All orders</h1>
            </div>
            <div class="col-lg-12">
            @include('layouts.message')

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>customer_name</th>
                                    <th>phone</th>
                                    <th>products</th>
                                    <th>total</th>
                                    <th>Address</th>
                                    <th>Action</th>
                    

                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($data as $order)
                                    <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$order->customer_name}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>
                                            <ul>
                                                @foreach($order->products as $product)
                                                    <li>{{ $product->name }} ({{$product->pivot->quantity}})</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>
                                            <a href="{{ url('/categories/1/edit')}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                            <form action="{{ url('/categories/'.$order->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
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
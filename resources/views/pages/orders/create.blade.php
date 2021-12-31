@extends('layouts.master')


@section('content')
<div class="content-wrapper">
    <div class="px-5">
        <div class="row">
            <div class="col-lg-7 my-3">

            @if(Session::has('cart'))
                <div class="cart-items my-3">
                    <div class="border rounded">
                        <div class="row bg-white py-2">
                        @include('layouts.message')
                            <div class="col-md-12">
                                <form role="form" action="{{ url('/orders')}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>customer Name</label>
                                            <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name')}}" placeholder="Enter customer name">
                                            @error('customer_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>custmor Email</label>
                                            <input type="email" name="customer_email" class="form-control @error('customer_email') is-invalid @enderror" value="{{ old('customer_email')}}" placeholder="Enter customer email">
                                            @error('customer_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>custmor Phone</label>
                                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone')}}" placeholder="Enter customer Phone">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="number" name="total" class="form-control @error('total') is-invalid @enderror" value="{{ $totalPrice }}" placeholder="Enter Total" Readonly>
                                            @error('total')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Address" name="address"></textarea>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="py-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">

                            <h6>Price </h6>

                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>${{ $totalPrice }}</h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>${{ $totalPrice }}</h6>
                        </div>
                    
                    </div>
                </div>
            </div>
        @else
       
            <table class="table table-bordered text-center bg-white">
                <tbody>
                    <tr>
                        <td>
                            you donot have items in cart please check products
                        </td>
                    </tr>
                </tbody>
            </table>
       
        @endif

            <!-- Button trigger modal -->
            </div>
        </div>
    </div>
</div>

@endsection


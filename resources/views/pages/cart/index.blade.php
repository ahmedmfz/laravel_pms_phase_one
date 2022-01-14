@extends('layouts.master')


@section('content')
<div class="content-wrapper">
<div class="px-5">
    <div class="row">
        <div class="col-lg-7 my-3">

            <div class="cart-items my-3">
                <div class="border rounded">
                    <div class="row bg-white py-2">
                       
                        <div class="col-md-12">
                            <table class="table table-bordered text-center">
                                @if(Session::has('cart'))
                                <thead>
                                    <tr>
                                        <th scope="col">item name</th>
                                        <th scope="col">price</th>
                                        <th scope="col">total</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($products as $product)
                                        <tr>
                                            <th>{{ $product['item']['name']}}</th>
                                            <td>{{ $product['item']['price']}}</td>
                                            <td>{{ $product['price'] }}</td>
                                            <td><span class="badge bg-success">{{ $product['qty']}}</span></td>
                                            <td>
                                                <form action="{{ url('/cart/'.$product['item']['id'] )}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                </form>
                                               
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td>
                                        you donot have items in cart please check products
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        @if(Session::has('cart'))
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


                <div class="text-center">
                    <a href="{{ url('/cart/destroy')}}" class="btn btn-danger">cancel order</a>
                    <a href="{{ url('/orders/create')}}" class="btn btn-warning">CheckOut</a>
                </div>
            </div>
        </div>
        @endif
        <!-- Button trigger modal -->

    </div>
</div>
</div>

@endsection


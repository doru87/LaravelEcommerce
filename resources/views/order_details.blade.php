@extends('layouts.app')
@section('content')

    <div class="orders">
        <div class="container mt-5 mb-5">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Total</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $order)
                            <tr>
                                <td><a href="/product-information/{{$order['products_id']}}">{{$order['product_title']}}</a></td>
                                <td>{{$order['product_price']}}</td>
                                <td>{{$order['product_quantity']}}</td>
                                <td>{{$order['product_price'] * $order['product_quantity']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
        
            </div>
        </div>
    </div>

@endsection
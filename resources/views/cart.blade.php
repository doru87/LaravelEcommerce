@extends('layouts.app')
@section('content')

    <div class="cart_list">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-cart border border-primary">
                        <thead class="bg-info text-white">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                    
                        @php
                        $cart = Session()->get('cart');
                        $dataList = $cart->unique('product_id');
                        $cart->groupBy('product_id')->map(function ($items) {
                                $quantity = $items->sum('quantity');
                                foreach ($items as $value) {
                                    $value->quantity = $quantity;
                                }
                        });
                        @endphp

                        @foreach ($dataList as $cartitem)
                            <tr>
                                <th scope="row"></th>
                                <td> <img src="{{$cartitem->image}}" class="cart-image" alt="..."></td>
                                <td> <a href="/product-information/{{$cartitem->id}}">{{$cartitem->title}}</a></td>
                                <td>{{$cartitem->price}}</td>
                                <td>{{$cartitem->quantity}}</td>
                                <td>{{$cartitem->quantity * $cartitem->price}}</td>
                                <td><a href="/removecart/{{$cartitem->product_id}}" class="btn btn-danger">Remove</a></td>
                            </tr>
                        @endforeach
                    
                    </table>

                    <div class="col-sm-12">
                        <a href="/makeorder" class="btn btn-info orderButton">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

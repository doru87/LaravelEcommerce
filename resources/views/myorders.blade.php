@extends('layouts.app')
@section('content')

    <div class="orders">
        <div class="container mt-5 mb-5">
            <div class="myorders-wrapper">
              <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Order id</th>
                      <th scope="col">Order Products</th>
                      <th scope="col">Payment Method</th>
                      <th scope="col">Date of order</th>
                      <th scope="col">View order</th>

                    </tr>
                  </thead>
                  <tbody>
                  
                      @foreach ($orders as $order)
                        <tr>
                          <td>{{$order['id']}}</td>
                          <td>
                              @foreach ($order['order_products'] as $product)
                                <a href="product-information/{{$product['products_id']}}">{{$product['product_title'].","}}</a>
                              @endforeach
                          </td>
                          <td>{{$order['payment_method']}}</td>
                          <td>{{date('d-m-Y', strtotime($order['created_at']))}}</td>
                          <td>
                            <a href="order-details/{{$product['orders_id']}}">Order</a></td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
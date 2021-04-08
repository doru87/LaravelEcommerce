<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Product;

class MyOrdersController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function displayOrders(){
        $orders = Order::where('users_id',Session()->get('user')['id'])->get()->toArray();
            return view('myorders')->with('orders',$orders);
    }

    public function displayOrderDetails($order_id){
        $order_details = Order_Product::where('orders_id',$order_id)->get();
            return view('order_details')->with('order_details',$order_details);
    }
}

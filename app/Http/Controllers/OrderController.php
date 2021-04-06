<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Product;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

require_once($_SERVER['SERVER_NAME'].'/vendor/stripe-php-master/init.php');

class OrderController extends Controller
{

    public function makeOrder(){
        $id = Session()->get('user')['id'];
        $cart = DB::table('carts')->join('products','carts.product_id','products.id')->where('carts.user_id', $id)->get();
        $dataList = $cart->unique('product_id');

        $cart->groupBy('product_id')->map(function ($item) {
            $quantity = $item->sum('quantity');
                foreach ($item as $value) {
                    $value->quantity = $quantity;
                }
        });

        $totalPriceCart = $dataList->map(function ($item){
             $total = $item->quantity * $item->price;
                return $total;
        });

        $total = $totalPriceCart->sum();
        $name = Session()->get('user')['name'];
        $fullname = explode(" ",$name);
        $firstname = $fullname[1];
        $lastname = $fullname[0];

        $profile = Profile::where('email',Session()->get('user')['email'])->get();

        $city="";
        $address="";
        $country="";

        foreach ($profile as $value) {
            $city= $value->city;
            $address= $value->address;
            $country= $value->country;
        }

        $shipping_charges = 15;
        return view('makeorder')->with(compact('total','firstname','lastname','city','address','country','shipping_charges'));
    }

    public function chargeCustomer(Request $request) {

        // Stripe::setApiKey(Config::get('services.stripe.secret_key'));
        // Stripe::setApiKey(env('STRIPE_API_SECRET'));
        Stripe::setApiKey("sk_test_51IDASUGMKwBbdaOBTD50A3cjPW23Bw35rLxlbEHNTDBGSsclvqHjZgOlCYkruzg21PJsYksCohAfx6XKItK5lUng00nxmbiNYA");

        $charge = Charge::create([
            'amount' => $request->total * 100,
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'description' => 'Order',
            'receipt_email' => Auth::user()->email,
            
        ]);
  
        if($charge['paid'] == true){
            $request->session()->flash('statusofpayment', 'Payment was successful!');
            
            Order::create([
                'users_id' => Session()->get('user')['id'],
                'name' => $request->lastname." ".$request->firstname,
                'email' => Session()->get('user')['email'],
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'zip_code' => $request->zip_code,
                'shipping_charges' => $request->shipping_charges,
                'payment_method' => $request->payment_method,
                'total' => $request->total,
            ]);
            
            $email = Session()->get('user')['email'];
            $order = Order::where('email',$email)->orderBy('id', 'DESC')->first();
            $cart_list = Session()->get('cart');

            foreach ($cart_list as $cart_item){
                Order_Product::create([
                    'orders_id' => $order->id,
                    'users_id' => Session()->get('user')['id'],
                    'products_id' => $cart_item->product_id,
                    'product_title' => $cart_item->title,
                    'product_price' => $cart_item->price,
                    'product_quantity' => $cart_item->quantity,
                ]);
            }

            $id = Session()->get('user')['id'];
            Cart::where('user_id',$id)->delete();
        }

        return redirect()->to('/makeorder'); 
    }

}

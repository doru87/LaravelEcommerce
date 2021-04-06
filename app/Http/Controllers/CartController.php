<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        if($request->session()->has('user')){
            $id = $request->session()->get('user')['id'];
            $cart = new Cart();
            $product_id = $request->input('product_id');
            $cart->product_id=$product_id;
            $cart->user_id = $id;
            $cart->quantity=$request->input('number_products');
            $cart->save();
            return redirect('/shoppingcart');
        }else{
            return redirect('/login');
        }
    }

    public function cartContent() {
        $id = Session()->get('user')['id'];
        $cart = DB::table('carts')->join('products','carts.product_id','products.id')->where('carts.user_id', $id)->get();
        Session()->put('cart',$cart);
        return view('cart');
     }

     public function removeCart($id) {
        Cart::where('product_id','=',$id)->delete();
        return redirect('/shoppingcart');
    }
}

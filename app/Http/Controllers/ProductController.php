<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProductController extends Controller
{
    
    public function index(Request $request){

        if($request->category){
            $products = Products::take(3)->get();
            $categories = Categories::all();
            $allproducts = Products::where('category',$request->category)->get();
        }else{
            $products = Products::take(3)->get();
            $allproducts = Products::all();
            $categories = Categories::all();
        }
        return view('home')->with(compact('products','allproducts','categories'));
    }
    public function productInformation ($id) {
        $product = Products::find($id);
        $profiles = Profile::all();
       return view('product')->with(compact('product','profiles'));
    }

    public function searchProduct(Request $request) {
         $searchword = $request->input('seachword');
         $data = Products::where('title','like',"%{$searchword}%")->get();
         return view('search')->with('searchProducts',$data);
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function categories(){
        $categories = Categories::all();
        return view('home')->with(compact('categories'));
    }
}

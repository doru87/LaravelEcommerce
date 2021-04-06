<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MyOrdersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/posts', function() {
    return view('posts.index');
});

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::get('/logout',[LogoutController::class,'store'])->name('logout');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::post('/profile',[ProfileController::class,'changeProfile']);
Route::get('/',[ProductController::class,'index'])->name('/');
Route::get('/product-information/{id}',[ProductController::class,'productInformation']);
Route::get('/search',[ProductController::class,'searchProduct']);
Route::post('/add-cart',[CartController::class,'addToCart']);
Route::get('/removecart/{id}',[CartController::class,'removeCart']);
Route::get('/shoppingcart',[CartController::class,'cartContent']);
Route::get('/makeorder',[OrderController::class,'makeOrder']);
Route::post('/makeorder',[OrderController::class,'chargeCustomer']);
Route::post('/comments/{product_id}',[CommentsController::class,'store']);
Route::get('/myorders',[MyOrdersController::class,'displayOrders'])->name('myorders');
Route::get('/order-details/{order_id}',[MyOrdersController::class,'displayOrderDetails']);
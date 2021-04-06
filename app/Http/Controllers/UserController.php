<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   function login(Request $request){  
    return User::where(['email' => $request->email])->first();          
   }
}

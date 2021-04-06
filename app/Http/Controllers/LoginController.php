<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(!Auth::attempt($request->only('email', 'password'),$request->remember)){
            return back()->with('status','Invalid login details');
        }
        $user = User::where('email',$request->input('email'))->first();
        $request->session()->put('user',$user);
    
        return redirect()->route('/');
     
    }
}

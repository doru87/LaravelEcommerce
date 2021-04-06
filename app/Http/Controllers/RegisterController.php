<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => '',
            'city' => '',
            'country' => '',
            'picture' => 'http://bootdey.com/img/Content/user_1.jpg'

        ]);
        
        event(new UserRegistered($user));
        
        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('login');
    }
}

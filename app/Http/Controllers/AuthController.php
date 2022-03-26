<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register_process(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);
    
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    
        if ($user) {
            auth('web')->login($user);
        }
        return redirect()->route('welcome');
    }
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function login_process(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required']
        ]);
    
        if (auth('web')->attempt($data)) {
            return redirect()->route('welcome');
        } else {
            return redirect()->route('login')->withErrors([
                'email' => 'Emial или пароль введены неверно!'
            ]);
        }
    }
    public function exit(){
    auth('web')->logout();
    return redirect()->route('welcome');
}
}

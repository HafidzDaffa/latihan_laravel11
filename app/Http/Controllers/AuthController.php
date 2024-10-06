<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:50'
        ]);

        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($input)){
            return redirect()->route('dashboard.admin');
        }
        else{
            return redirect()->back()->with('error', 'Login failed');
        }
    }
}

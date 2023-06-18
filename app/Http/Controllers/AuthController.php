<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        
        if ($request->method() == 'GET') {
            return view('auth.login');
        }

        $data = $request->only('email','password');

        if(Auth::attempt($data)) {
            // login işlemi başarılı
            return redirect()->route('dashboard')->with('login','succes');
        }
        else {
            // login işlemi başarısız 
            return redirect()->back()->with('login','fail');
        }
    }

    public function register(Request $request){
        if ($request->method() == 'GET') {
            return view('auth.register');
        } else if ($request -> method() == 'POST'){
            $data = $request-> only ('name','email','password');
            User::create($data);

            return redirect ( route ('login'))-> with ('register');
        }
    }
    
}

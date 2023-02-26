<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            if($user->level== '1'){
                return redirect()->intended('home');   
            }elseif($user->level == '2'){
                return redirect()->intended('tabelpengaduan');
            }elseif($user->level == '2'){
                return redirect()->intended('home');
            }
        }
        return view('users.login');

    }

    public function proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email-required'=>'email tidak boleh kosong',
        ]
    
    );

    $kredensial = $request->only('email','password');

    if(Auth::attempt($kredensial)){
        $request->session()->regenerate();
        $user = Auth::user();
            if($user->level== '1'){
                return redirect()->intended('home');   
            }elseif($user->level == '2'){
                return redirect()->intended('tabelpengaduan');
            }
            elseif($user->level == '3'){
                return redirect()->intended('home');
            }
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email'=> 'Maaf Email atau password anda salah'
        ])->onlyInput('email');

        
        
    }

        public function logout(Request $request){
            Auth::logout();
            return redirect('login');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RegisterController extends Controller
{
    public  function index(){
        return view('register.register');
    }

    public  function proses(Request $request){
        // dd($request->all());
        User::create([
            'name'=> $request->name,
            'username' =>$request->username,
            'nik' =>$request->nik,
            'email' =>$request->email,
            'telp' =>$request->telp,
            'password' =>bcrypt($request->password),
            'level'=> '3',
        ]);
        return redirect()->intended('login');
    }
}

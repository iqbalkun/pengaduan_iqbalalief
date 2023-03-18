<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public  function index(){
            $ttl_user = User::count('id');
            $ttl_pengaduan = Pengaduan::count('id');

        return view('home.home',compact('ttl_user','ttl_pengaduan'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;

use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();
        
        return view('data_pengaduan.index', compact('pengaduan'));

    }
}

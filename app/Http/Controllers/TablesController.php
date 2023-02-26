<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function index()
    {
        // $pengaduan['pengaduan'] = Pengaduan::get();
        // return view('pengaduan.index')->with($pengaduan);

            return view('data_pengaduan.index');

    }
}

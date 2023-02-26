<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabelPengaduanController extends Controller
{
    public function index()
    {
        // $pengaduan['pengaduan'] = Pengaduan::get();
        // return view('pengaduan.index')->with($pengaduan);

            return view('tabel_pengaduan.index');

    }
}

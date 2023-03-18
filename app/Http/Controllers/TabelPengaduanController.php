<?php

namespace App\Http\Controllers;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class TabelPengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();
        
        return view('tabel_pengaduan.index', compact('pengaduan'));

    }
}

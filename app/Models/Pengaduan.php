<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = "pengaduan";
    protected $primarykey = "id";
    protected $fillable =[
        'tgl_pengaduan','jenis_pengaduan','nik','isi_laporan','foto'
    ];
}

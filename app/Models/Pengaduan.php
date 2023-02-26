<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = "pengaduan";
    protected $primarykey = "id_pengaduan";
    protected $fillable =[
        'jenis_pengaduan','nik','isi_laporan'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanBug extends Model

{

    use HasFactory;
    protected $table = "laporan_bug";
    protected $primarykey = "id";
    protected $fillable = [
        'jenis', 'deskripsi', 'tgl_kejadian', 'pelapor', 'status'
    ];
}

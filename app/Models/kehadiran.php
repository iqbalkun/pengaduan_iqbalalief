<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kehadiran extends Model
{
    use HasFactory;
    protected $table = "kehadiran";
    protected $primarykey = "id";
    protected $fillable = [
        'namaKaryawan', 'tanggalMasuk', 'waktuMasuk', 'status', 'waktuKeluar'
    ];
}


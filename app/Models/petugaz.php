<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugaz extends Model
{
    use HasFactory;
    protected $table = "petugaz";
    protected $primarykey = "id_petugas";
    protected $fillable =[
        'namaPetugas','username','password','telp','email','level'
    ];
}

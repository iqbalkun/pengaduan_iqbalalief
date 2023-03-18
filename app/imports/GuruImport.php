<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'id'=> auth()->user()->id,
            'nama'=>$row['nama'],
            'nip'=>$row['nip'],
            'jenisKelamin'=>$row['jenisKelamin'],
            'tempatLahir'=>$row['tempatLahir'],
            'tanggalLahir'=>$row['tanggalLahir'],
            'nik'=>$row['nik'],
            'agama'=>$row['agama'],
            'alamat'=>$row['alamat'],
            'isActive'=>$row['isActive'],
            'isDeleted'=>$row['isDeleted'], 
        ]);
    }
    
    public function headingRow(): int
    {
        return 3;
    }
}

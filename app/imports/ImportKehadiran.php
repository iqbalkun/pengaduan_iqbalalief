<?php

namespace App\Imports;

use App\Models\Kehadiran;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportKehadiran implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kehadiran([
            'namaKaryawan' => $row['namaKaryawan'],
            'tanggalMasuk' => $row['tanggalMasuk'],
            'waktuMasuk' => $row['waktuMasuk'],
            'status' => $row['status'],
            'waktuKeluar' => $row['waktuKeluar'],
        ]);
    }
}

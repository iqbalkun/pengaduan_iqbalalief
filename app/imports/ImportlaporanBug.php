<?php

namespace App\Imports;

use App\Models\laporanBug;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportlaporanBug implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new laporanBug([
            'jenis' => $row['jenis'],
            'deskripsi' => $row['deskripsi'],
            'tgl_kejadian' => $row['tgl_kejadian'],
            'pelapor' => $row['pelapor'],
            'status' => $row['status'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],

        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\Kehadiran;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\excel\Events\BeforeExport;
use Maatwebsite\excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

class ExportKehadiran implements FromCollection, WithEvents, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function Collection()
    {
        return Kehadiran::all();
    }

    public function headings(): array
    {
        return [
            'namaKaryawan',
            'tanggalMasuk',
            'waktuMasuk',
            'status',
            'WaktuKeluar',

        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class  => function (AfterSheet $event) {
                $event->sheet->getColoumnDimension('A')->setAutoSize('true'); //no
                $event->sheet->getColoumnDimension('B')->setAutoSize('true');
                $event->sheet->getColoumnDimension('C')->setAutoSize('true');
                $event->sheet->getColoumnDimension('D')->setAutoSize('true');
                $event->sheet->getColoumnDimension('E')->setAutoSize('true');
                $event->sheet->getColoumnDimension('F')->setAutoSize('true');
                $event->sheet->getColoumnDimension('G')->setAutoSize('true');
                $event->sheet->getColoumnDimension('H')->setAutoSize('true');

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCellls('A1:H1');
                $event->sheet->setCellValue('A1', 'DataKehadiran Table');

            }
        ];
    }
}

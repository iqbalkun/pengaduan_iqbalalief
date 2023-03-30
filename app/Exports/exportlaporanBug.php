<?php

namespace App\Exports;

use App\Models\laporanBug;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\excel\Events\AfterSheet;

class exportlaporanBug implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function Collection()
    {
        return laporanBug::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'jenis',
            'deskripsi',
            'tgl_kejadian',
            'pelapor',
            'status',
            'created_at',
            'updated_at',


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
                $event->sheet->setCellValue('A1', 'Data LaporanBug Table');
            }
        ];
    }
}

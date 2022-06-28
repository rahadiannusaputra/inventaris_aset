<?php

namespace App\Exports;

use App\Models\inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InventarisExport implements FromCollection, WithHeadings, ShouldAutoSize,  WithEvents, WithStyles, WithTitle, WithCustomStartCell
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $title = 'Daftar Rekapan Inventaris';

    public function collection()
    {

        $inventaris = inventaris::whereHas('verifikasi', function ($query) {
            $query->where('status', 'Terverifikasi');
        })->get();
        if (count($inventaris) === 0) {
            abort(500);
        }
        return collect([
            $this->dataInventars($inventaris)
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle(1)->getFont()->setSize(14)->setBold(true);
        $sheet->getStyle(2)->getFont()->setBold(true);
        $sheet->getStyle(3)->getFont()->setBold(true);

        $sheet->mergeCells('A1:G1');
        $sheet->mergeCells('D2:G2');
        $sheet->mergeCells('A2:A3');
        $sheet->mergeCells('B2:B3');
        $sheet->mergeCells('C2:C3');

        $sheet->setCellValue('A1', $this->title);
    }

    public function title(): string
    {

        return $this->title;
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function headings(): array
    {
        return [[
            'No',
            'Registerasi',
            'Keterangan',
            'Mutasi',
        ], [
            '', '', '', 'Jenis Mutasi',
            'Harga',
            'TAG',
            'Uraian'
        ]];
    }
    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                $highrow = $event->sheet->getDelegate()->getHighestRow();

                $event->sheet->styleCells(
                    'A1:G' . $highrow,
                    [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ]
                    ]
                );
                $event->sheet->styleCells(
                    'A1',
                    [

                        'alignment' => [

                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                        ],


                    ]

                );
                $event->sheet->styleCells(
                    'A2',
                    [

                        'alignment' => [

                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ],


                    ]

                );

                $event->sheet->styleCells(
                    'B2',
                    [

                        'alignment' => [

                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ],


                    ]

                );

                $event->sheet->styleCells(
                    'C2',
                    [

                        'alignment' => [

                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                        ],


                    ]

                );

                $event->sheet->styleCells(
                    'D2',
                    [

                        'alignment' => [

                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                        ],


                    ]
                );
                $event->sheet->styleCells(
                    'D3',
                    [

                        'alignment' => [

                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                        ],


                    ]
                );
                $event->sheet->styleCells(
                    'E3',
                    [

                        'alignment' => [

                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                        ],


                    ]

                );

                $event->sheet->styleCells(
                    'F3',
                    [

                        'alignment' => [

                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                        ],


                    ]
                );
            }
        ];
    }
    public function dataInventars($model)
    {

        foreach ($model as $key => $inventaris) {
            $data[$key]['no'] = $key + 1;
            $data[$key]['kode_barang'] = $inventaris->kode_barang;
            $data[$key]['keterangan'] = $inventaris->keterangan;
            $data[$key]['jenis_mutasi'] = $inventaris->jenis_mutasi;
            $data[$key]['harga'] = $inventaris->harga;
            $data[$key]['tag'] = $inventaris->tag;
            $data[$key]['uraian'] = $inventaris->uraian;
        }

        return $data;
    }
}

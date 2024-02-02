<?php

namespace App\Exports;

use App\Models\Alumno;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Cell;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class AlumnosExport implements FromView, WithStrictNullComparison, ShouldAutoSize, WithEvents,
WithColumnFormatting{
    use Exportable;

    private $values;
    private $filters;

    public function __construct() {
        $this->values = Alumno::where('estatus','A')->get();
    }

    public function view(): View
    {
        return view("excel.alumnos",["alumnos"=>$this->values]);
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class => function(AfterSheet $event){

                // TOP Filtros
                $event->sheet->getStyle('B1:B2')->applyFromArray([
                    'font'=>[
                        'bold' => true
                    ]
                ]);
                // TOP Filtros

                // Tabla
                $event->sheet->getStyle('A8:H8')->applyFromArray([
                    'font'=>[
                        'bold' => true
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_MEDIUM,
                            'color' => ['argb' => '150570'],
                        ]
                    ]
                ]);
                $lastColumn = "H".(8+$this->values->count() );

                $event->sheet->getStyle('A8:'.$lastColumn)->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '150570'],
                        ]
                    ],
                ]);


            }
        ];
    }
    public function columnFormats(): array
    {

        return [
            'H' => NumberFormat::FORMAT_NUMBER
            /*
            'I' => NumberFormat::FORMAT_ACCOUNTING_USD,
            'J' => NumberFormat::FORMAT_ACCOUNTING_USD,
            'L' => NumberFormat::FORMAT_ACCOUNTING_USD,
            'E' => NumberFormat::FORMAT_NUMBER,
                    //
        */];

    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setIsURL(true);
        $drawing->setPath(public_path('img/logo.png'));
        $drawing->setHeight(50);
        $drawing->setWidth(140);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

}

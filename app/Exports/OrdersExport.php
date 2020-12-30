<?php

namespace App\Exports;

use App\Models\orders;
/*
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
*/
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrdersExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function view(): View
    {
        return view('ordersexport', [
            'orders' => orders::all()
        ]);
    }

    /*
    public function startCell(): string {
        return 'B3';
    }
    public function headings(): array
    {

    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            3   => ['font' => ['bold' => true]]
        ];
    }
    */
}

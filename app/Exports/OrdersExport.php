<?php

namespace App\Exports;

use App\Models\orders;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class OrdersExport implements FromView, ShouldAutoSize, WithCustomStartCell, WithHeadings, WithStyles
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('vendor.adminlte.data', [
            'orders' => orders::all()
        ]);
    }
    public function startCell(): string {
        return 'B3';
    }
    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Order ID',
            'Order Name',
            'Order Price',
            'Order Type',
            'Payment Type',
            'Date',
            'Date',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            3   => ['font' => ['bold' => true]]
        ];
    }
}

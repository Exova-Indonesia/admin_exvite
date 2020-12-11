<?php

namespace App\Exports;

use App\Models\orders;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements FromCollection, ShouldAutoSize, WithCustomStartCell, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return orders::all();
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

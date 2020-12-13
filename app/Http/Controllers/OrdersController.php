<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function dashboard() {
        $orders = \App\Models\orders::all();
        return view('/home', ['orders' => $orders]);
        
    }
    public function orders() {
        $orders = \App\Models\orders::all();
        return view('/orders', ['orders' => $orders]);
        
    }
    public function export_excel() {
        return Excel::download(new OrdersExport, 'data_orders.xlsx');
    }
    public function tampilModal($id) {
        $orders = \App\Models\orders::find([$id]);
        return view('vendor/adminlte/modals-data', ['orders' => $orders]);
    }
}

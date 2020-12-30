<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use \App\Models\orders;
use \App\Models\User;
use DB;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard() {
        $orders = orders::first()->all()->take(5);
        $custom = orders::where('order_type', 'Custom')->where('status', 'success')->take(10)->get();
        $CustomOrders = orders::where('order_type', 'Custom')->where('status', 'success')->count();
        $countOrders = orders::where('order_type', 'Templates')->where('status', 'success')->count();
        $CountUser = User::count();
        $TotalOrders = orders::where('status', 'success')->count();
        $chartOrders = orders::select('*', orders::raw('count(id) as total'))->
        groupBy(orders::raw('MONTH(created_at)'))->get();
        return view('/home', ['orders' => $orders, 'custom' => $custom, 
        'OrdersTemplate' => $countOrders, 'OrdersCustom' => $CustomOrders,
        'CountUsers' => $CountUser, 'TotalOrders' => $TotalOrders, 'chartOrders' => $chartOrders]);
    }
    public function orders() {
        $orders = \App\Models\orders::all();
        return view('/orders', ['orders' => $orders]);
        
    }
    public function export_excel() {
        return (new OrdersExport)->download('data_orders.xlsx');
    }
    public function tampilModal($id) {
        $orders = \App\Models\orders::find([$id]);
        return view('vendor/adminlte/modals-data', ['orders' => $orders]);
    }
}

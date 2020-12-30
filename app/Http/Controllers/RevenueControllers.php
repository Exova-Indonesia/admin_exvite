<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;

class RevenueControllers extends Controller
{
    public function data() {
        $data = orders::where('status', 'success')->get();
        $tpayments = orders::where('status', 'success')->count();
        $trevenue = orders::where('status', 'success')->sum('order_price');
        $tgopay = orders::where('status', 'success')->where('payment_type', 'Gopay')->sum('order_price');
        $tbank = orders::where('status', 'success')->where('payment_type', 'Bank Transfer')->sum('order_price');
        return view('/revenue', ['tpay' => $tpayments, 'orders' => $data,
        'trev' => $trevenue, 'gopay' => $tgopay, 'bank' => $tbank]);
    }
}

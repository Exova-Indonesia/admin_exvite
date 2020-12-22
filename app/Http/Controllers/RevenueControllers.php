<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;

class RevenueControllers extends Controller
{
    public function data() {
        $data = orders::all();
        return view('/revenue', ['orders' => $data]);
    }
}

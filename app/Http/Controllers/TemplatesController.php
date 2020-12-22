<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Templates;

class TemplatesController extends Controller
{
    public function view() {
        $data = Templates::all();
        return view('/template', ['data' => $data]);
    }
}

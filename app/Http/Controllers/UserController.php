<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function users() {
        $user = User::all();
        return view('/users', ['users' => $user]);
    }

    public function export_excel() {
        return Excel::download(new UsersExport, 'data_users.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DataSpam;
use App\Imports\DataSpamImport;
use Storage;

class ImportController extends Controller
{
    function dataspam() {
        $data = DataSpam::all();
        return view('/import', ['data' => $data]);
    }

    function importdata(Request $request) {
        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]);
        $file = $request->file('file');
        $name = rand().$file->getClientOriginalName();
        Storage::putFileAs('public/dataspam/', $file, $name);

        Excel::import(new DataSpamImport, public_path('/storage/dataspam/'.$name));
        return redirect('/import')->with(['status' => 'Success Import Data']);
    }
}

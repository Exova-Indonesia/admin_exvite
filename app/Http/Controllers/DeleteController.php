<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Templates;

class DeleteController extends Controller
{
    public function delete_files($id) {
        Templates::where('templates_id', $id)->update([
            'templates_files' => '',
        ]);
        return redirect('upload/template/update/'.$id)->with(['status' => 'Delete successfully']);
    }
    public function delete_thumbnail($id) {
        Templates::where('templates_id', $id)->update([
            'templates_thumbnail' => '',
        ]);
        return redirect('upload/template/update/'.$id)->with(['status' => 'Delete successfully']);
    }
}

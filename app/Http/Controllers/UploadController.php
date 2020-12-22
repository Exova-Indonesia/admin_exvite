<?php

namespace App\Http\Controllers;

use Storage;
use Zip;
use Illuminate\Http\Request;
use App\Models\Templates;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function upload_blogs() {
        return view('/upblog');
    }

    public function upload_template($id) {
        Templates::insert([
            'templates_id' => intval($id),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/upload/template/update/'.$id)->with('status', 'Successful create upload templates form');
    }
    
    public function view_template($id) {
        $data = Templates::where('templates_id', $id)->first();
        return view('/uptemp', ['data' => $data]);
    }

    public function update_files(Request $request) {
        $validator = Validator::make($request->all(), [
            'templates_files' => 'required|file|mimes:zip',
        ]);
        if($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $files = $request->file('templates_files');
        $files_new_name = $request->templates_id.'-templates.'.$files->getClientOriginalExtension();
        Storage::putFileAs('public/templates/'.$request->templates_id, $files, $files_new_name);

        $zip = Zip::open('storage/templates/'.$request->templates_id.'/'.$files_new_name);
        //$zip->delete($files_new_name);
        $zip->extract('storage/templates/'.$request->templates_id);
        //$zip->add('public/storage/templates/'.$request->templates_id, true);

        Templates::where('templates_id', $request->templates_id)->update([
            'templates_files' => $files_new_name,
        ]);
        return response()->json(['status'=>'Templates ' .$files->getClientOriginalName(). ' uploaded successfully',
        'files'=>$files_new_name]);
    }

    public function update_thumbnail(Request $request) {
        $validator = Validator::make($request->all(), [
            'templates_thumbnail' => 'required|mimes:png,jpg,jpeg|max:4096',
        ]);
        if($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $files = $request->file('templates_thumbnail');
        $files_new_name = $request->templates_id.'-thumbnail.'.$files->getClientOriginalExtension();
        Storage::putFileAs('public/thumbnails/'.$request->templates_id, $files, $files_new_name);

        Templates::where('templates_id', $request->templates_id)->update([
            'templates_thumbnail' => $files_new_name,
        ]);
        return response()->json(['status'=>'Thumbnail ' .$files->getClientOriginalName(). ' uploaded successfully',
        'files'=>$files_new_name]);
    }


    public function update_data(Request $request) {
        $validator = Validator::make($request->all(), [
            'templates_name' => ['required', 'string', 'max:50'],
            'templates_description' => ['required', 'string', 'max:500'],
            'templates_price' => ['required'],
            'templates_status' => ['required', 'string', 'max:50'],
            'templates_author' => ['required', 'string', 'max:20'],
        ]);
        if($validator->fails()) {
            return response()->json(['status'=>'Field data correctly'], 422);
        }
        Templates::where('templates_id', $request->templates_id)->update([
            'templates_name' => $request->templates_name,
            'templates_description' => $request->templates_description,
            'templates_price' => preg_replace('/[IDR . ]/','',$request->templates_price),
            'templates_status' => $request->templates_status,
            'templates_author' => $request->templates_author,
        ]);
        return response()->json(['status'=>'Your template was saved successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Mail\ShouOutMail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ShoutOut;
use App\Notifications\Suspend;

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

    public function shoutout(Request $request) {
        $subyek = $request->subyek;
        $pesan = $request->pesan;
        Notification::route('mail', $request->email)->notify(new ShoutOut($subyek, $pesan));
        return redirect('/users')->with(['status' => 'Email Sent Successfully']);
    }

    public function suspend(Request $request) {
        Notification::route('mail', $request->email)->notify(new Suspend());
        return redirect('/users')->with(['status' => 'Suspend Sent Successfully']);
    }

    public function export_excel() {
        return Excel::download(new UsersExport, 'data_users.xlsx');
    }

    function email() {
            //$user = User::all();
            //foreach ($user as $u) {
            //foreach ([$u->email] as $recipient) {
            Mail::to('manager.arthachan@gmail.com')->send(new ShouOutMail());
            //}  
        //}
    }
}

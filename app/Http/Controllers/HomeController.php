<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /** home page */
    public function index()
    {

        $users = DB::table('users')->count();
        $user_activity_logs = DB::table('user_activity_logs')->count();
        $activity_logs = DB::table('activity_logs')->count();
        $file = File::all();
        return view('dashboard.home',compact('users','user_activity_logs','activity_logs','file'));
    }


    public function store (FileRequest $request) {

      $file =  File::create([
            'file' => $request -> input('file'),
            'branch' => $request -> input ('branch'),
            'department' => $request -> input ('department'),
          ]);

      $file->save();
        Toastr::success('File Uploaded Successfully :)','Success');

    }


}


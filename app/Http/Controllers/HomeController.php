<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $filename = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('file' ,$filename,'public');

          $file =  $user->file()->create([
              'file' => $path,
               'FileName' => $filename



//              'branch' => $request->input('branch'),
//              'department' => $request->input('department'),
//              'receiver' => $request->input('receiver'),
          ]);

        Toastr::success('File Uploaded Successfully :)','Success');

          return redirect('/home');



    }

//if($request->hasFile('receipt_attachment')){
//
//$document = $request->file('receipt_attachment');
//
//$filename = !is_null($request->control_number) ? $request->control_number.'.'.$document->getClientOriginalExtension() :  time().'_'.$document->getClientOriginalName();
//
//$destination = storage_path('app/public/payments');
//
//$document->move($destination , $filename);
//
//}else{
//
//
//
//    return redirect()->back()->with('error' , 'application failed No receiptattachment');
//
//}


}


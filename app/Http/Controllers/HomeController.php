<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use App\Models\Form;
use App\Models\User;
use App\Notifications\FileSentNotification;
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
        $users = User::where('id', '!=' , Auth::user()->id)->get();
        $user_activity_logs = DB::table('user_activity_logs')->count();
        $file = File::with('sender')->where('receiver',Auth::user()->id)->get();
        return view('dashboard.home', compact('users', 'user_activity_logs' ,'file'));
    }


    public function store(FileRequest $request)
    {
        $user = Auth::user();
        $filename = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('file', $filename, 'public');

        $file = $user->file()->create([
            'file' => $path,
            'filename' => $filename,
            'branch' => $request->input('branch'),
            'department' => $request->input('department'),
            'receiver' => $request->input('receiver'),
        ]);

        Toastr::success('File Uploaded Successfully :)', 'Success');

        $user->notify(new FileSentNotification());

        return redirect('/home');


    }


    public function uploadProfile(Request $request){

        if ($request ->hasFile('profile')){
            $profile = $request->file('profile');
            $extension = $profile->getClientOriginalExtension();
            $profilePic = time().'.'.$extension;
            $profile ->storeAs('profile', $profilePic, 'public');
        }

        $file = $user->file()->create([
            'branch' => $request->input('branch'),
            'department' => $request->input('department'),
            'receiver' => $request->input('receiver'),
        ]);

        Toastr::success('File Uploaded Successfully :)', 'Success');

        return redirect('/home');

    }
}


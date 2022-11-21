<?php

namespace App\Http\Controllers;

use App\Models\File;
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
        $staff = DB::table('staff')->count();
        $users = DB::table('users')->count();
        $user_activity_logs = DB::table('user_activity_logs')->count();
        $activity_logs = DB::table('activity_logs')->count();
        $file = File::all();
        return view('dashboard.home',compact('staff','users','user_activity_logs','activity_logs','file'));
    }
}
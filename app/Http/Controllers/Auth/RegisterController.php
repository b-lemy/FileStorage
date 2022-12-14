<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {

        $roles = DB::table('role_type_users')->get();

        return view('auth.register',compact('roles'));
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'firstname'      => 'required|string|max:255',
            'lastname'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $dt        = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();


        User::create([
            'firstname'      => $request->firstname,
            'lastname'      => $request->lastname,
            'avatar'    => $request->image,
            "role_name" =>$request->role_name,
            'email'     => $request->email,
            'join_date' => $todayDate,
            'password'  => Hash::make($request->password),
        ]);
        Toastr::success('Create new account successfully :)','Success');
        return redirect('login');
    }
}

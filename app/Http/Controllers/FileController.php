<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        $file = User::all();

//        dd($file);

        return view("dashboard.home" , compact("file"));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $request->file('file')->store("docs");
    }

    public function show(File $file)
    {
        //
    }


    public function edit(File $file)
    {
        //
    }


    public function update(Request $request, File $file)
    {
        //
    }


    public function destroy(File $file)
    {
        //
    }
}

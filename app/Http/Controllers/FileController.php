<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{

    public function index()
    {

    }


    public function DLoad($id)
    {
        $upload = File::find($id);
        $pathToFile = storage_path("app/public/");
        return $pathToFile;
//        return Response::download($pathToFile.$upload->file);

//        return dd('ok');

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

<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index()
    {

    }


    public function DLoad($id)
    {
        $upload = File::find($id);
        $pathToFile = storage_path("app/public/");
//        return $pathToFile;
        return Response::download($pathToFile.$upload->file);

//        return dd('ok');

    }

    public function store(Request $request)
    {
        return $request->file('file')->store("docs");
    }



    public function edit(File $file)
    {
        //
    }


    public function update(Request $request, File $file)
    {
        //
    }


    public function destroy($id)
    {
        $file = File::find($id);
        if(Storage::exists('public/'.$file->file)){
            Storage::delete('public/'.$file->file);
        }
        $file->delete();
        Toastr::info('File Deleted Successfully :)', 'Deleted');

        return redirect('/home');
    }
}

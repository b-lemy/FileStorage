<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{

    public function generatePDF()
    {
        $users = User::get();




        $data = [
            'title' => 'Credit Form',
            'date' => date('m/d/Y'),
            'users' => $users,

        ];

        $pdf = PDF::loadView('snippets.preview', $data);

        return $pdf->download('laravel.pdf');
    }
}

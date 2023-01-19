<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{

    public function generatePDF()
    {
        $users = Auth::user();





        $data = [
            'title' => 'Credit Form',
            'date' => date('d/m/Y'),
            'user' => $users,

        ];

        $pdf = PDF::loadView('snippets.preview', $data);

        return $pdf->download('laravel.pdf');
    }
}

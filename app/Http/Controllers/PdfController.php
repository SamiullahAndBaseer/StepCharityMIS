<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
        $pdf = PDF::loadView('sample', [
            'title'=> 'PDF file makes by Samiullah',
            'description'=> 'This is an example Laravel PDF by Samiullah Gulzar.',
            'footer'=> 'by <a href="https://codeanddeploy.com">codeanddeploy.com</a>'
        ]);
    
        return $pdf->download('sample.pdf');
    }
}

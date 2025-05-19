<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $pdf=PDF::loadView('new');
        return $pdf->download('fazli.pdf');
    }
}

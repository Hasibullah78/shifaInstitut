<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KankorController extends Controller
{
    public function Search()
    {
        return view('kankor.result');
    }
    public function register(){
        return view('kankor.reg');
    }
}

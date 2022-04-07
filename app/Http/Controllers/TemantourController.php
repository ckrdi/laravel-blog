<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemantourController extends Controller
{
    public function index()
    {
        return view('temantour');
    }
}

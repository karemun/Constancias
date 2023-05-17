<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstanciasController extends Controller
{
    public function index()
    {
        return view('directivo.constancias.generar-constancias');
    }
}

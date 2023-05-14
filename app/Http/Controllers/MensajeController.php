<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MensajeController extends Controller
{
    public function index($vista)
    {
        if (Session::has('formulario')) {   // Verificar si se envio el formulario antes de para redirigir a la ruta successful
            Session::forget('formulario');  // Se limpia la sesion
            return view($vista);            //Se redirige a la vista dada
        } 
        else {
            return redirect()->route('index'); //Si no, se redirige al inicio
        }
    }
}

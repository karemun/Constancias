<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class RegistrarEvidenciaController extends Controller
{
    public function index()
    {
        return view('evidencia.folio');
    }

    public function verificarFolio(Request $request)
    {
        //Busca si existe el folio y si esta autorizado
        $folio = Evento::where('folio', $request->folio)->where('auth', true)->first();

        if ($folio) {
            return view('evidencia.subir-evidencia');
        } else {
            return redirect()->back()->withErrors(['folio' => 'No se encontró el número de folio.']);
        }
    }
}

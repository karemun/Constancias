<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ConstanciasController extends Controller
{
    public function index(Evento $evento)
    {
        return view('directivo.constancias.generar-constancias', compact('evento'));
    }

    public function store(Request $request, Evento $evento)
    {
        dd($request, $evento);
        
        //PDF
        $data = $evento->toArray();
        $pdf = PDF::loadView('pdf.constancia', ['data'=>$data])->setPaper('a4', 'landscape');
        return $pdf->stream();  //Se muestra el PDF

        //Se desactiva el evento
        //$evento->auth = null;
        //$evento->save();
    }
}

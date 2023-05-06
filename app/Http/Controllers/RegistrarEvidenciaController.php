<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Archivo;
use App\Models\Evidencia;
use Illuminate\Support\Str;
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
        $evento = Evento::where('folio', $request->folio)->where('auth', true)->first();

        if ($evento) {
            return view('evidencia.subir-evidencia')->with('folio', $evento->folio);
        } else {
            return redirect()->back()->withErrors(['folio' => 'No se encontró el número de folio.']);
        }
    }

    public function store(Request $request)
    {   
        $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:2048',
            'links' => 'max:255',
            'archivo' => 'required',
        ]);

        if (($request->pdf == null) || ($request->archivo == null)) {
            return redirect()->route('evidencia.index')->with('mensaje', 'Ha ocurrido un error. Asegurate de enviar los datos correctos.');
        }

        //Busca si existe el folio y si esta autorizado
        $evento = Evento::where('folio', $request->folio)->where('auth', true)->first();

        if ($evento) {
            //Almacena el pdf enviado
            $documento = $request->pdf; //Se obtiene el pdf
            $nombreDoc = Str::uuid() . "." . $documento->extension(); //Genera ID unico y agrega extension
            $documento->storeAs('public/documentos', $nombreDoc); //Se guarda el documento

            //Se crea la evidencia
            Evidencia::create([
                'evento_id' => $evento->id,
                'documento' => $nombreDoc,
                'enlace' => $request->links,
            ]);

            //Se crean los archivos
            for ($i=1; $i <= count($request->archivo); $i++) {
                Archivo::create([
                    'evento_id' => $evento->id,
                    'evidencia_id' => Evidencia::latest('id')->first()->id,
                    'archivo' => $request->archivo[$i],
                ]);
            }

            //Se envia correo a los directivos

        } else {
            return redirect()->route('evidencia.index')->with('mensaje', 'No se encontro el numero de folio.');
        }

        return view('evento.successful');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\InformacionEmail;
use App\Models\Evento;
use App\Models\Archivo;
use App\Models\Evidencia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegistrarEvidenciaController extends Controller
{
    public function index($folio)
    {
        if (Session::has('formularioFolio')) {   //Verificar si se envio el folio antes de entrar a la vista
            return view('evidencia.subir-evidencia', compact('folio'));
        } 
        else {
            return redirect()->route('evidencia.buscar'); //Si no, redirige al formulario
        }
    }

    public function buscarFolio()
    {
        return view('evidencia.folio');
    }

    public function verificarFolio(Request $request)
    {
        $evento = Evento::where('folio', $request->folio)->where('auth', true)->first(); //Busca si existe el folio y si esta autorizado

        if ($evento) {
            Session::put('formularioFolio', true);                          //Almacena que se envio el formulario en la sesión
            $folio = $evento->folio;                                        //Almacena el folio
            return redirect()->route('evidencia.index', compact('folio'));  //Le envia el folio a la ruta
        } 
        else {
            return redirect()->back()->withErrors(['folio' => 'No se encontró el número de folio.']);
        }
    }

    public function store(Request $request)
    {   
        //Validaciones
        $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:2048',
            'links' => 'max:500',
            'archivo' => 'required',
        ]);

        if ($request->pdf == null || empty($request->archivo)) {
            return redirect()->back()->withErrors(['mensaje' => 'Ha ocurrido un error. Asegurate de enviar los datos correctos.']);
        }

        $evento = Evento::where('folio', $request->folio)->where('auth', true)->first(); //Busca si existe el folio y si esta autorizado

        if ($evento) {
            Session::forget('formularioFolio');  //Se limpia la sesion

            //Almacena el pdf enviado
            $documento = $request->pdf;                               //Se obtiene el pdf
            $nombreDoc = Str::uuid() . "." . $documento->extension(); //Genera ID unico y agrega extension
            $documento->storeAs('public/documentos', $nombreDoc);     //Se guarda el documento

            //Se guardan la evidencia en BD
            Evidencia::create([
                'evento_id' => $evento->id,
                'documento' => $nombreDoc,
                'enlace' => $request->links,
            ]);

            //Se guardan los archivos en BD
            for ($i=1; $i <= count($request->archivo); $i++) {
                Archivo::create([
                    'evento_id' => $evento->id,
                    'evidencia_id' => Evidencia::latest('id')->first()->id,
                    'archivo' => $request->archivo[$i],
                ]);
            }

            //Se notifica con correo a los directivos
            $emails = User::where('email_verified_at', '!=', null)->pluck('email'); //Se obtienen los correos verificados
            $data = [
                'nombre' => $evento->nombre,
                'fecha_inicio' => $evento->fecha_inicio,
                'fecha_final' => $evento->fecha_final,
            ];
            Mail::to($emails)->send(new InformacionEmail('mails.evidencia', 'Se Solicitaron Constancias', $data)); //Se envia correo con la informacion

            Session::put('formulario', true);  // Almacena que se envio formulario en la sesión
            return redirect()->route('mensaje.index', ['vista' => 'evidencia.successful']); //Se redirige a la vista con la ruta
        } 
        else {
            return redirect()->route('evidencia.buscar')->with('mensaje', 'No se encontro el numero de folio.');
        }
    }
}

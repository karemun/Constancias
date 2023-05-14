<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use App\Mail\PdfEmail;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::where('auth', false)->paginate(10); //Se obtienen los eventos no autorizados

        return view('directivo.evento.pendientes', compact('eventos'));
    }

    public function show(Evento $evento)
    {
        if ($evento->auth == true) { //Si el evento ya ha sido autorizado
            return view('directivo.evento.mensaje')->with('mensaje', 'El evento ya ha sido autorizado por otro directivo.');
        } else {
            return view('directivo.evento.show', compact('evento'));
        }
    }

    public function autorizar(Request $request, Evento $evento)
    {
        $data = array_merge($request->all(), $evento->toArray(), ['participante' => $evento->participante->toArray()]);
        $accion = $request->input('accion');        //Se obtiene la accion del boton
        $solicitante = $evento->solicitante->email; //Se obtiene el email del solicitante

        
        switch ($accion) {

            case 'autorizar':
                //Se autoriza y actualiza el evento
                $evento->auth = true;
                $evento->save();
                
                //Se genera el PDF
                $pdf = PDF::loadView('pdf.evento-pdf', ['data'=>$data]);

                //Se envia mail con el pdf adjunto
                //Mail::to($solicitante)->send(new PdfEmail('mails.autorizar-evento', 'Autorización de Evento', $data, $pdf));
                //$pdf->loadHTML('<h1>Test</h1>');
                //return $pdf->stream();  //Se muestra el PDF

                break;

            case 'rechazar':
                //Se envia mail y se elimina el evento
                //Mail::to($solicitante)->send(new MyEmail('mails.rechazar-evento', 'Autorización de Evento', $data));
                
                $evento->delete();
                break;
        }

        return redirect()->route('directivo.evento.index')->with('mensaje', 'Se realizo la acción en el evento correctamente.'); //Se redirecciona al usuario
    }
}

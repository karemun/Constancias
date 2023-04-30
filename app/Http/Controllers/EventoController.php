<?php

namespace App\Http\Controllers;

use App\Mail\PdfEmail;
use App\Mail\MyEmail;
use App\Models\Evento;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::where('auth', false)->paginate(10); //Se obtienen los eventos no autorizados y se agrega paginacion

        return view('directivo.evento.pendientes', compact('eventos')); //Se envian los eventos a la vista
    }

    public function show(Evento $evento)
    {
        return view('directivo.evento.show', compact('evento'));
    }

    public function autorizar(Request $request, Evento $evento)
    {
        $data = array_merge($request->all(), $evento->toArray(), ['participante' => $evento->participante->toArray()]);
        $accion = $request->input('accion');                        //Se obtiene la accion del boton
        $solicitante = $evento->solicitante->email;                 //Se obtiene el email del solicitante

        
        switch ($accion) {
            //Si se autoriza el evento
            case 'autorizar':
                //Se autoriza y actualiza el evento
                $evento->auth = true;
                $evento->save();
                
                //Se genera el PDF
                $pdf = PDF::loadView('pdf.evento-pdf', ['data'=>$data]);

                //Se envia mail con el pdf adjunto
                Mail::to($solicitante)->send(new PdfEmail('mails.autorizar-evento', 'Autorización de Evento', $data, $pdf));
                //$pdf->loadHTML('<h1>Test</h1>');
                //return $pdf->stream();  //Se muestra el PDF

                break;

            //Si se rechaza el evento
            case 'rechazar':
                Mail::to($solicitante)->send(new MyEmail('mails.rechazar-evento', 'Autorización de Evento', $data)); //Se envia email
                $evento->delete();  //Se elimina el evento
                break;
        }

        return redirect()->route('directivo.evento.index')->with('mensaje', 'Se realizo la acción en el evento correctamente.'); //Se redirecciona al usuario
    }
}

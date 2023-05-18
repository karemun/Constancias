<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Evidencia;
use Illuminate\Http\Request;
use App\Mail\InformacionEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EvidenciaController extends Controller
{
    public function index()
    {   //Se obtienen los eventos que contengan evidencia
        $eventos = Evento::has('evidencia')
                ->where('auth', true)
                ->orderBy('fecha_inicio', 'asc') // Ordenar por fecha de inicio del evento
                ->paginate(10);
        
        return view('directivo.evidencia.pendientes', compact('eventos'));
    }

    public function show(Evento $evento)
    {
        //Si el evento ya no existe o ya fue autorizado
        if ($evento->evidencia->count() == 0 || is_null($evento->auth)) {
            return view('directivo.evidencia.mensaje')->with('mensaje', 'La evidencia ya ha sido autorizada/rechazada por otro directivo.');
        } else {
            return view('directivo.evidencia.show', compact('evento'));
        }
    }

    public function autorizar(Request $request, Evento $evento)
    {
        $accion = $request->input('accion');        //Se obtiene la accion del boton
        $solicitante = $evento->solicitante->email; //Se obtiene el email del solicitante
        
        switch ($accion) {

            case 'autorizar':
                return redirect()->route('directivo.constancias.index', compact('evento'));

            case 'rechazar':
                //Se eliminan los archivos de evidencia del storage
                $evidencias = $evento->evidencia;
                foreach ($evidencias as $evidencia) {

                    $nombreDocumento = $evidencia->documento;
                    $rutaArchivo = 'public/documentos/' . $nombreDocumento;

                    if (Storage::exists($rutaArchivo)) { // Verifica si el documento existe y luego lo elimina
                        Storage::delete($rutaArchivo);
                    }

                    foreach ($evidencia->archivo as $archivo) {
                        $nombreArchivo = $archivo->archivo;
                        $rutaArchivo = 'public/archivos/' . $nombreArchivo;

                        if (Storage::exists($rutaArchivo)) { // Verifica si el documento existe y luego lo elimina
                            Storage::delete($rutaArchivo);
                        }
                    }
                }

                //Se envia mail y se elimina el evento
                $data = [
                    'observacion' => $request->observacion,
                    'nombre' => $evento->nombre,
                ];
                Mail::to($solicitante)->send(new InformacionEmail('mails.rechazar-evidencia', 'Solicitud de Constancias', $data));//*/

                Evidencia::where('evento_id', $evento->id)->delete(); //Se elimina de la BD

                return redirect()->route('directivo.evidencia.index')->with('mensaje', 'Se realizo la acción correctamente.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\MyEmail;
use App\Models\Evento;
use App\Models\Solicitante;
use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventoController extends Controller
{
    public $code=0;

    public function index()
    {
        return view('event.register');
    }

    public function store(Request $request)
    {
        $this->code = $this->generateUniqueCode(); //Se genera numero unico
        
        //Validaciones
        $this->validate($request, [

            //Validacion del solicitante
            'nombre' => 'required|max:100',
            'email' => 'required|email|max:100',

            //Validacion del evento
            'evento' => 'required|max:100',
            'tipo' => 'required|max:100',
            'departamento' => 'required|max:100',
            'ubicacion' => 'required|max:100',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'material' => 'required|max:255',

            //Validacion de los participantes
            'nombre_p' => 'required|max:100',
            'rol_p' => 'required|max:50',
            'actividad_p' => 'required|max:100',
            'puesto_p' => 'required|max:50',
        ]);

        //Se crea el evento
        Evento::create([
            'evento' => $request->evento,
            'tipo' => $request->tipo,
            'departamento' => $request->departamento,
            'ubicacion' => $request->ubicacion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'material' => $request->material,
            'folio' => $this->code,     //Almacena el numero unico
        ]);

        //Se guarda el solicitante
        Solicitante::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'evento_id' => Evento::latest('id')->first()->id,   //Se recupera el ultimo id creado de Evento
        ]);

        //Se guardan los participantes
        for ($i=0; $i < count($request->nombre_p); $i++) {
            if($request->codigo_p[$i] != null) {
                Participante::create([
                    'nombre' => $request->nombre_p[$i],
                    'rol' => $request->rol_p[$i],
                    'actividad' => $request->actividad_p[$i],
                    'puesto' => $request->puesto_p[$i],
                    'codigo' => $request->codigo_p[$i],
                    'evento_id' => Evento::latest('id')->first()->id,
                ]);
            } else {
                Participante::create([
                    'nombre' => $request->nombre_p[$i],
                    'rol' => $request->rol_p[$i],
                    'actividad' => $request->actividad_p[$i],
                    'puesto' => $request->puesto_p[$i],
                    'codigo' => null,
                    'evento_id' => Evento::latest('id')->first()->id,
                ]);
            }
        }

        //Se envia email a los usuarios registrados
        $emails = User::where('email_verified_at', '!=', null)->pluck('email'); //Se obtienen los correos verificados
        $data = $request->all();    //Se almacena la informacion enviada
        Mail::to($emails)->send(new MyEmail('mails.solicitar-evento', 'Se solicito un nuevo evento', $data)); //Se envia correo con la informacion

        return view('event.successful');
    }

    public function generateUniqueCode()    //Funcion que genera un numero unico aleatorio
    {
        $letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        
        do {
            $folio = uniqid() . substr(str_shuffle($letras), 0, 5) . rand(100, 999);
        } while (Evento::where("folio", "=", $folio)->first());
        
        return $folio;
    }
}

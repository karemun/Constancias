<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('event.register');
    }

    public function store(Request $request)
    {
        //Validaciones
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'email' => 'required|email|max:100',
            'evento' => 'required|max:100',
            'tipo' => 'required|max:100',
            'departamento' => 'required|max:100',
            'ubicacion' => 'required|max:100',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'material' => 'required|max:255',
        ]);

        //Se guarda el evento
        Event::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'evento' => $request->evento,
            'tipo' => $request->tipo,
            'departamento' => $request->departamento,
            'ubicacion' => $request->ubicacion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'material' => $request->material
        ]);

        return redirect()->route('event.participant');
    }
}

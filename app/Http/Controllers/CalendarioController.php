<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index()
    {
        $events = [];
        $eventos = Evento::where('auth', true)->get();

        foreach ($eventos as $evento) {
            $events[] = [
                'title' => $evento->nombre,
                'start' => $evento->fecha_inicio,
                'end' => $evento->fecha_final,
            ];
        }

        return view('calendario.index', compact('events'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    //Informacion que tiene que leer y procesar
    protected $fillable = [
        'nombre',
        'email',
        'evento',
        'tipo',
        'departamento',
        'ubicacion',
        'fecha_inicio',
        'fecha_final',
        'material',
        'folio'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id',
        'nombre',
        'rol',
        'actividad',
        'puesto',
        'codigo'
    ];
}

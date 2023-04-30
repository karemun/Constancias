<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    //Informacion que tiene que leer y procesar
    protected $fillable = [
        'nombre',
        'tipo',
        'departamento',
        'ubicacion',
        'fecha_inicio',
        'fecha_final',
        'material',
        'folio'
    ];

    //Se definen las relaciones de la BD
    public function solicitante()
    {
        return $this->hasOne(Solicitante::class); //Un evento tiene un solicitante
    }

    public function participante()
    {
        return $this->hasMany(Participante::class); //Un evento tiene muchos participantes
    }
}

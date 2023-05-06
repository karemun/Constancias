<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id',
        'documento',
        'enlace',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class); //Pertenece a Evento
    }

    public function archivo()
    {
        return $this->hasMany(Archivo::class); //Evidencia tiene muchos archivos
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'evento_id'
    ];

    public function evento()
    {   
        return $this->belongsTo(Evento::class); //Pertenece a evento
    }
}

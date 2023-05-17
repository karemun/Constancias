<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id',
        'evidencia_id',
        'archivo',
        'tipo'
    ];

    public function evidencia()
    {
        return $this->belongsTo(Evidencia::class); //Pertenece a Evidencia
    }
}

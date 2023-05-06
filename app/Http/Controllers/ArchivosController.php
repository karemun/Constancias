<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'file|mimes:png,jpg,jpeg,gif,pdf,doc,docx,ppt,mp4,avi,mov,wmv|max:10240', //Tamaño maximo de 10mb
        ]);

        $archivo = $request->file('file'); //Se obtiene el archivo
        $nombreArchivo = Str::uuid() . "." . $archivo->extension(); //Genera ID unico y agrega extension
        $archivo->storeAs('public/archivos', $nombreArchivo); //Se guarda el archivo

        return response()->json(['archivos' => $nombreArchivo]);
    }

    public function destroy($archivo)
    {
        Storage::delete('public/archivos/' . $archivo);

        return response()->json(['mensaje' => 'Archivo eliminado']);
    }
}

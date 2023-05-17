<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ArchivosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'file|mimes:png,jpg,jpeg,pdf,doc,docx,ppt,pptx,mp4,avi,mov,wmv|max:20480', //Tamaño maximo de 10mb
        ]);

        $archivo = $request->file('file'); //Se obtiene el archivo
        $nombreArchivo = Str::uuid() . "." . $archivo->extension(); //Genera ID unico y agrega extension
        $archivo->storeAs('public/archivos', $nombreArchivo); //Se guarda el archivo

        //Si es imagen
        if ($archivo->getClientOriginalExtension() == 'jpg' || $archivo->getClientOriginalExtension() == 'jpeg' || $archivo->getClientOriginalExtension() == 'png') {
            //Se redimensiona su tamaño
            $archivoServidor = Image::make($archivo);
            $archivoServidor->fit(1000, 1000);
            $archivoServidor->save(public_path('storage/archivos/' . $nombreArchivo));
        } else {
            $archivo->storeAs('public/archivos', $nombreArchivo);
        }

        //return response()->json(['mensaje' => 'Archivo subido con exito.']);
        return response()->json(['archivos' => $nombreArchivo]);
    }

    public function destroy($archivo)
    {
        Storage::delete('public/archivos/' . $archivo);

        return response()->json(['mensaje' => 'Archivo eliminado.']);
    }
}

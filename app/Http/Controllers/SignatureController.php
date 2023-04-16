<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SignatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'signatures' => 'required'
        ]);

        $imagen = $request->file('imagen'); //Obtiene la imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension(); //Genera ID unico para la imagen y agrega extension
        $imagenServidor = Image::make($imagen); //Se procesa con InterventionImage
        $imagenServidor->fit(700,300); //Tamaño de la imagen
        $imagenPath = public_path('signatures') . '/' . $nombreImagen; //Se crea la ruta de guardado
        $imagenServidor->save($imagenPath); //Se guarda la imagen en el servidor

        //Se busca el usuario que se esta modificando
        $usuario = User::find(auth()->user()->id);

        //Se actualiza la BD del usuario
        $usuario->signature = $nombreImagen ?? auth()->user()->signature ?? null; //Si no se subio imagen, la que ya estaba, sino, queda null
        $usuario->save();

        return redirect()->route('profile.edit')->with('status', 'signature-updated');
    }
}

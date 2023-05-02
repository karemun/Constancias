<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); //Se obtienen las cuentas creadas

        return view('directivo.cuentas.registradas', compact('users'));
    }

    public function destroy(User $user)
    {
        //Si existe firma, la elimina
        if($user->firma) {
            $imagen_path = public_path('firmas/' . $user->firma);
            if(File::exists($imagen_path)) {
                unlink($imagen_path);
            }
        }

        $user->delete();

        return redirect()->route('directivo.cuenta.index')->with('mensaje', 'Se elimino la cuenta correctamente.');;
    }
}

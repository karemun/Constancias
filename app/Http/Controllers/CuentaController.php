<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        dd($user->toArray());
    }
}

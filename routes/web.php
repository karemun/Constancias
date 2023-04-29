<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\RegistrarEventoController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//RUTAS PARA EL USUARIO
Route::middleware('guest')->group(function () {
    //Pagina principal
    Route::get('/', function () { return view('index'); });

    //Registrar evento
    Route::get('/registrar-evento', [RegistrarEventoController::class, 'index'])->name('evento.index');
    Route::post('/registrar-evento', [RegistrarEventoController::class, 'store'])->name('evento.store');
});

//RUTAS PARA EL PERFIL
Route::get('/dashboard', function () {
    return view('directivo.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    //Editar perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [SignatureController::class, 'store'])->name('profile.signature');

    //Agregar cuenta
    Route::get('/add-account', [RegisteredUserController::class, 'index'])->name('profile.account.index');
    Route::post('/add-account', [RegisteredUserController::class, 'store'])->name('profile.account.store');

    //Eventos pendientes
    Route::get('/eventos-pendientes', [EventoController::class, 'index'])->name('directivo.evento.index');
    Route::get('/evento/{evento:folio}', [EventoController::class, 'show'])->name('directivo.evento.show');

    //Autorizar evento
    Route::post('/evento/{evento:folio}.pdf', [EventoController::class, 'autorizar'])->name('directivo.evento.autorizar');
});

require __DIR__.'/auth.php';

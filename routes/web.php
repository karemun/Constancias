<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmaController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArchivosController;
use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ConstanciasController;
use App\Http\Controllers\RegistrarEventoController;
use App\Http\Controllers\RegistrarEvidenciaController;
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

//Mostrar Calendario
Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');

//RUTAS PARA EL USUARIO
Route::middleware('guest')->group(function () {
    //Pagina principal
    Route::get('/', function () { return view('index'); })->name('index');

    //Registrar evento
    Route::get('/registrar-evento', [RegistrarEventoController::class, 'index'])->name('evento.index');
    Route::post('/registrar-evento', [RegistrarEventoController::class, 'store'])->name('evento.store');

    //Verificar folio
    Route::get('/verificar-folio', [RegistrarEvidenciaController::class, 'buscarFolio'])->name('evidencia.buscar');
    Route::post('/verificar-folio', [RegistrarEvidenciaController::class, 'verificarFolio'])->name('evidencia.verify');

    //Subir evidencia
    Route::get('/solicitar-constancias/{folio}', [RegistrarEvidenciaController::class, 'index'])->name('evidencia.index');
    Route::post('/solicitar-constancias/evidencia', [RegistrarEvidenciaController::class, 'store'])->name('evidencia.store');
    Route::post('/solicitar-constancias/archivos', [ArchivosController::class, 'store'])->name('evidencia.archivos.store');   //Almacena los archivos

    //Mensaje
    Route::get('/mensaje/{vista}', [MensajeController::class, 'index'])->name('mensaje.index');
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
    Route::post('/profile', [FirmaController::class, 'store'])->name('profile.firma');

    //Agregar cuenta
    Route::get('/agregar-cuenta', [RegisteredUserController::class, 'index'])->name('profile.account.index');
    Route::post('/agregar-cuenta', [RegisteredUserController::class, 'store'])->name('profile.account.store');

    //Perfiles Registrados
    Route::get('/cuentas-registradas', [CuentaController::class, 'index'])->name('directivo.cuenta.index');
    Route::delete('/cuentas-registradas/{user}', [CuentaController::class, 'destroy'])->name('directivo.cuenta.destroy');

    //Eventos pendientes
    Route::get('/eventos-pendientes', [EventoController::class, 'index'])->name('directivo.evento.index');
    Route::get('/evento/{evento:folio}', [EventoController::class, 'show'])->name('directivo.evento.show');
    //Autorizar evento
    Route::post('/evento/{evento:folio}', [EventoController::class, 'autorizar'])->name('directivo.evento.autorizar');

    //Evidencia pendiente
    Route::get('/evidencia-pendiente', [EvidenciaController::class, 'index'])->name('directivo.evidencia.index');
    Route::get('/evidencia/{evento:folio}', [EvidenciaController::class, 'show'])->name('directivo.evidencia.show');
    //Autorizar evidencia
    Route::post('/evidencia/{evento:folio}', [EvidenciaController::class, 'autorizar'])->name('directivo.evidencia.autorizar');

    //Generar constancias
    Route::get('/generar-constancias/{evento:folio}', [ConstanciasController::class, 'index'])->name('directivo.constancias.index');
});

require __DIR__.'/auth.php';

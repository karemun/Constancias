<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    //Pagina principal
    Route::get('/', function () { return view('index'); });

    //Registrar evento
    Route::get('/registrar-evento', [EventController::class, 'index'])->name('event.index');
    Route::post('/registrar-evento', [EventController::class, 'store'])->name('event.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/jugador', function () {
    return view('jugador.index');
});

Route::get('/jugador/create',[JugadorController::class,'create']);
*/

Route::resource('jugador',JugadorController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [JugadorController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [JugadorController::class, 'index'])->name('home');
});

Route::get('exportar_jugadores_excel', [JugadorController::class,'exportarExcel'])->name('exportar_jugadores_excel');
Route::get('exportar_jugadores_PDF', [JugadorController::class,'exportarPDF'])->name('exportar_jugadores_PDF');
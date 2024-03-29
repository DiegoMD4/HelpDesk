<?php

use App\Models\Tickets;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\EntradaController;

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

route::resource('ticket', TicketsController::class)->middleware('auth');
route::resource('admin', AdminController::class)->middleware('auth.admin');
route::resource('areas', AreasController::class)->middleware('auth.admin');
route::resource('roles', RolesController::class)->middleware('auth.admin');
route::resource('estados', EstadosController::class)->middleware('auth.admin');
route::resource('entrada', EntradaController::class)->middleware('auth.admin');
route::resource('tecnico', TecnicoController::class)->middleware('auth.tecnico');


Auth::routes(['reset'=>false]);


Route::middleware('auth')->group(function () {    
    Route::get('/', [TicketsController::class, 'index'])->name('ticket.index');
    
    Route::get('/pendiente', [TicketsController::class, 'pendiente'])->name('ticket.pendiente');

});

Route::middleware('auth.tecnico')->group(function () {
    Route::get('/aceptado', [TecnicoController::class, 'aceptado'])->name('tecnico.aceptado');
    Route::delete('aceptado/{id}', function ($id) {
        Tickets::destroy($id);
        return redirect('aceptado');
    });
}); 
Route::middleware('auth.admin')->group(function () {
    Route::get('/entrada', [EntradaController::class, 'entrada'])->name('admin.entrada');
    Route::get('/asignado', [EntradaController::class, 'asignado'])->name('admin.asignado');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;
use Symfony\Component\Routing\Router;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\RolesController;

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


Auth::routes(['reset'=>false]);


Route::middleware('auth')->group(function () {    
    Route::get('/', [TicketsController::class, 'index'])->name('ticket.index');
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
Route::middleware('auth.admin')->group(function () {
    Route::get('/areas', [AreasController::class, 'index'])->name('admin.areas.index');
});
Route::middleware('auth.admin')->group(function () {
    Route::get('/roles', [RolesController::class, 'index'])->name('admin.roles.index');
});
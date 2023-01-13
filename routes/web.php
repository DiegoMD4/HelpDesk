<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;
use Symfony\Component\Routing\Router;
use App\Http\Controllers\AdminController;

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

Auth::routes(['reset'=>false]);


Route::middleware('auth')->group(function () {
    
Route::get('/', [TicketsController::class, 'index'])->name('home');

});

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')
->name('admin.index');
<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'web'], function()
{
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Auth::routes();
});
//Rotas para pacientes (view, create, edit e delete)
Route::get('/pacientes', [App\Http\Controllers\PacientesController::class, 'index'])->name('pacientes')->middleware('auth');
Route::get('/pacientes/new', [App\Http\Controllers\PacientesController::class, 'new'])->name('new')->middleware('auth');
Route::post('/pacientes/add', [App\Http\Controllers\PacientesController::class, 'add'])->name('add')->middleware('auth');
Route::get('/pacientes/edit/{id}', [App\Http\Controllers\PacientesController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/pacientes/update/{id}', [App\Http\Controllers\PacientesController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/pacientes/delete/{id}', [App\Http\Controllers\PacientesController::class, 'delete'])->name('delete')->middleware('auth');
// ----------    ---------------------        ------------------ \\

//Rotas para Consultas (view, create, edit e delete).
Route::get('/consultas', [App\Http\Controllers\ConsultasController::class, 'index'])->name('consultas');
Route::get('/consultas/new', [App\Http\Controllers\ConsultasController::class, 'new'])->name('new')->middleware('auth');
Route::post('/consultas/add', [App\Http\Controllers\ConsultasController::class, 'add'])->name('add')->middleware('auth');
Route::get('/consultas/edit/{id}', [App\Http\Controllers\ConsultasController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/consultas/update/{id}', [App\Http\Controllers\ConsultasController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/consultas/delete/{id}', [App\Http\Controllers\ConsultasController::class, 'delete'])->name('delete')->middleware('auth');




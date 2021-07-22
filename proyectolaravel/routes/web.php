<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\informeController;

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
    return view('welcome');
});
Route::get('/informe_gastos/{informe_gasto}/confirm', [\App\Http\Controllers\informeController::Class, 'confirm' ])->name('ConfirmDelete');

Route::get('/prueba', [\App\Http\Controllers\controladorFicha::Class, 'index' ]);
Route::get('/adios', [\App\Http\Controllers\primerControlador::Class, 'index' ]);
Route::get('/crear', [\App\Http\Controllers\primerControlador::Class, 'crear' ]);
Route::resource('/informe_gastos',informeController::Class );

Route::get('/informe_gastos/{informe_gasto}/gasto/create', [\App\Http\Controllers\gastosController::Class, 'create' ])->name('CreateGasto');
Route::post('/informe_gastos/{informe_gasto}/gasto', [\App\Http\Controllers\gastosController::Class, 'store' ])->name('StoreGasto');
Route::get('/informe_gastos/{informe_gasto}/gasto/edit', [\App\Http\Controllers\gastosController::Class, 'edit' ])->name('EditGasto');
Route::put('/informe_gastos/{informe_gasto}/gasto/update', [\App\Http\Controllers\gastosController::Class, 'update' ])->name('UpdateGasto');
Route::get('/informe_gastos/{informe_gasto}/gasto/confirm', [\App\Http\Controllers\gastosController::Class, 'confirm' ])->name('ConfirmDeleteG');
Route::delete('/informe_gastos/{informe_gasto}/gasto', [\App\Http\Controllers\gastosController::Class, 'destroy' ])->name('DestroyGasto');


Route::get('/informe_gastos/{informe_gasto}/confirmMail', [\App\Http\Controllers\informeController::Class, 'confirmMail' ])->name('ConfirmMail');
Route::post('/informe_gastos/{informe_gasto}/sendMail', [\App\Http\Controllers\informeController::Class, 'sendMail' ])->name('SendMail');


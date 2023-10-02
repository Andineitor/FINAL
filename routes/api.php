<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login    
Route::post('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');

// Rutas protegidas
Route::group(['middleware' => 'auth:sanctum'], function () {

    // API para pacientes
    Route::apiResource('clientes', App\Http\Controllers\ClientesController::class);
    Route::apiResource('reservas', App\Http\Controllers\ReservasController::class);
    Route::apiResource('vehiculos', App\Http\Controllers\VehiculosController::class);



    //logout
    Route::post('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

});





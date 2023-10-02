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
    Route::apiResource('pacientes', App\Http\Controllers\PacienteController::class);
    Route::apiResource('especialidades', App\Http\Controllers\EspecialidadController::class);
    Route::apiResource('citas', App\Http\Controllers\CitaController::class);



    //logout
    Route::post('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

});





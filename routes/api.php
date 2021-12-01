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

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/logout', 'AuthController@logout');
});

Route::apiResource('categorias',      App\Http\Controllers\CategoriasController::class);
Route::apiResource('subcategorias',   App\Http\Controllers\SubCategoriasController::class);
Route::apiResource('gestioningresos', App\Http\Controllers\GestionIngresosController::class);
Route::apiResource('apuntesgastos',   App\Http\Controllers\ApuntesGastosController::class);
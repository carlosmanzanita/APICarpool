<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\PanicoController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('modalidades', ModalidadController::class)
->names('modalidades');

Route::resource('alumnos', AlumnosController::class)
->names('alumnos');

Route::resource('tags', TagController::class)
->names('tags');

Route::resource('autos', AutoController::class)
->names('autos');

Route::resource('panico', PanicoController::class)
->names('panico');
<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\AventonController;
use App\Http\Controllers\AventonTagController;
use App\Http\Controllers\ConfirmarController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\DestinoemergenteController;
use App\Http\Controllers\EncuentroController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\PanicoController;
use App\Http\Controllers\PieController;
use App\Http\Controllers\PieTagController;
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

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

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

Route::resource('destino', DestinoController::class)
->names('destino');

Route::resource('encuentro', EncuentroController::class)
->names('encuentro');

Route::resource('destinoemergente', DestinoemergenteController::class)
->names('destinoemergente');

Route::resource('aventon', AventonController::class)
->names('aventon');

Route::resource('confirmar', ConfirmarController::class)
->names('confirmar');

Route::resource('pie', PieController::class)
->names('pie');

Route::resource('aventon-tag', AventonTagController::class)
->names('aventon-tag');

Route::resource('pie-tag', PieTagController::class)
->names('pie-tag');

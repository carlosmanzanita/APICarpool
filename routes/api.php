<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\Api\AuthController;
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

Route::post('/auth/iniciar-sesion', [AuthController::class, 'loginUser']);

Route::post('/auth/registro', [AuthController::class, 'createUser']);

Route::get('/auth/cerrar-sesion', [AuthController::class, 'logoutUser'])
->middleware('auth:sanctum');

Route::get('/auth/ver-sesion', [AuthController::class, 'verSesion'])
->middleware('auth:sanctum');

Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('modalidades', ModalidadController::class)
->middleware('auth:sanctum')
->names('modalidades');

Route::resource('tags', TagController::class)
->middleware('auth:sanctum')
->names('tags');

Route::resource('autos', AutoController::class)
->middleware('auth:sanctum')
->names('autos');

Route::resource('panico', PanicoController::class)
->middleware('auth:sanctum')
->names('panico');

Route::resource('destino', DestinoController::class)
->middleware('auth:sanctum')
->names('destino');

Route::resource('encuentro', EncuentroController::class)
->middleware('auth:sanctum')
->names('encuentro');

Route::resource('destinoemergente', DestinoemergenteController::class)
->middleware('auth:sanctum')
->names('destinoemergente');

Route::put('confirma-solicitud/{aventon_id}', [AventonController::class, 'confirmarSolicitud'])
->middleware('auth:sanctum')
->name('confirma-solicitud');

Route::resource('aventon', AventonController::class)
->middleware('auth:sanctum')
->names('aventon');

Route::resource('confirmar', ConfirmarController::class)
->middleware('auth:sanctum')
->names('confirmar');

Route::resource('pie', PieController::class)
->middleware('auth:sanctum')
->names('pie');

Route::resource('aventon-tag', AventonTagController::class)
->middleware('auth:sanctum')
->names('aventon-tag');

Route::put('activacion-panico', [PieController::class, 'activacionPanico'])
->middleware('auth:sanctum')
->name('activacion-panico');

Route::get('panicos-activados', [PieController::class, 'panicosActivados'])
->middleware('auth:sanctum')
->name('panicos-activados');

Route::get('quitar-panico', [PieController::class, 'quitarPanico'])
->middleware('auth:sanctum')
->name('quitar-panico');

Route::resource('pie-tag', PieTagController::class)
->middleware('auth:sanctum')
->names('pie-tag');

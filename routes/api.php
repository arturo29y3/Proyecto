<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\IntegradoraController;

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

//Rutas JWT//

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::get('me', [AuthController::class, 'me']);
Route::post('register', [AuthController::class, 'register']);
Route::post('guzzle', [AuthController::class, 'register']);

//RUTAS ADAFRUIT//

Route::post('/distancia/{id}', [IntegradoraController::class, 'InsertarDistancia']);
Route::post('/movimiento/{id}', [IntegradoraController::class, 'InsertarMovimiento']);
Route::post('/puerta/{id}', [IntegradoraController::class, 'InsertarPuerta']);
Route::post('/distancia', [IntegradoraController::class, 'InsertarDis']);
Route::post('/movimiento', [IntegradoraController::class, 'InsertarMov']);
Route::post('/puerta', [IntegradoraController::class, 'InsertarPu']);

//ELIMINAR DATOS POR USUARIO//
Route::delete('/eliMovimiento/{id}', [IntegradoraController::class, 'eliminarMovimiento']);
Route::delete('/eliDistancia/{id}', [IntegradoraController::class, 'eliminarDistancia']);
Route::delete('/eliPuerta/{id}', [IntegradoraController::class, 'eliminarPuerta']);
Route::delete('/eliMovimiento', [IntegradoraController::class, 'eliminarMov']);
Route::delete('/eliDistancia', [IntegradoraController::class, 'eliminarDis']);
Route::delete('/eliPuerta', [IntegradoraController::class, 'eliminarPu']);


//MOSTRAR DATOS//
Route::get('/datoDis/{id}', [IntegradoraController::class, 'MostrarRegistroDistancia']);
Route::get('/datoMov/{id}', [IntegradoraController::class, 'MostrarRegistroMovimiento']);
Route::get('/datoPu/{id}', [IntegradoraController::class, 'MostrarRegistroPuerta']);
Route::get('/datoDis', [IntegradoraController::class, 'mostrardis']);
Route::get('/datoMov', [IntegradoraController::class, 'mostrarmov']);
Route::get('/datoPu', [IntegradoraController::class, 'mostrarpu']);

//MOSTRAR DATOS POR FECHA//
Route::get('/fechaDistancia/{fecha}',[IntegradoraController::class,'fechasDis']);
Route::get('/fechaMovimiento/{fecha}',[IntegradoraController::class,'fechasMov']);
Route::get('/fechaPuerta/{fecha}',[IntegradoraController::class,'fechasPu']);

//BOTON//
Route::post('/boton',[IntegradoraController::class,'boton']);



//GUZZLE//
Route::get('/JSON',[JsonController::class,'guzzle']);


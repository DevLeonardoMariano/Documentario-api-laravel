<?php

use App\Http\Controllers\AvaliacaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTipoController;

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

Route::post('logout', [UserController::class, 'logout']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("login", [UserController::class, 'login']);

Route::resources([
    'documentarios' => DocumentarioController::class,
    'users' => UserController::class,
    'tipoDeUsuarios' => UserTipoController::class,
    
]);

Route::post('avaliacao/{documentario}',[AvaliacaoController::class, 'store']);

Route::middleware("auth:api")->group(function() {

    Route::post('logout', [UserController::class, 'logout']);
    
});
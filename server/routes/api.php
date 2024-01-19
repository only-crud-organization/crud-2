<?php

use App\Http\Controllers\ProdutoController;
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

Route::get('/', function() 
{
    return 'Funcionando!';
});

// ROTAS

// [GET]
Route::get('produtos', [ProdutoController::class, 'index']);

// [POST]
Route::post('produtos/criar', [ProdutoController::class, 'store']);

// [PUT]
Route::put('produtos/editar/{id}', [ProdutoController::class, 'update']);

// [DELETE]
Route::delete('produtos/excluir/{id}', [ProdutoController::class, 'destroy'] );
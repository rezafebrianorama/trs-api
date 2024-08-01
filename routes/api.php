<?php

use \App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\UserController;
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

//PRODUK
Route::middleware('auth:sanctum')->get('produks', [ProdukController::class, 'get']);
Route::middleware('auth:sanctum')->get('produk/{id}', [ProdukController::class, 'get']);
Route::middleware('auth:sanctum')->post('produk', [ProdukController::class, 'store']);
Route::middleware('auth:sanctum')->put('produk/{id}', [ProdukController::class, 'update']);
Route::middleware('auth:sanctum')->delete('produk/{id}', [ProdukController::class, 'destroy']);

//USER
Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class);
Route::middleware('auth:sanctum')->get('users', [UserController::class, 'get']);
Route::middleware('auth:sanctum')->get('user/{id}', [UserController::class, 'get']);
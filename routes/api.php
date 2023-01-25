<?php

use App\Http\Controllers\Api\apiResepController;
use App\Http\Controllers\Api\ObatController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Frontend\TransactionController;
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

// agar terproteksi auth saat aksesnya
Route::middleware('auth:sanctum')->group(function () {
    // Route::get('/obat', [ObatController::class, 'index']);
    Route::get('/logout', [UserController::class, 'logout']);
});

// resep obat
Route::get('/resepObat', [apiResepController::class, 'index']);
Route::get('/resepObat/{id}', [apiResepController::class, 'getResep']);
Route::post('resepObat', [apiResepController::class, 'store']);
Route::put('resepObat/{resepObat}', [apiResepController::class, 'update']);
Route::delete('resepObat/{resepObat}', [apiResepController::class, 'delete']);

Route::post('/midtrans-callback', [TransactionController::class, 'callback']);

// obat
Route::get('/obat', [ObatController::class, 'index']);
Route::post('/obat/create', [ObatController::class, 'store']);
Route::put('/obat/update/{id}', [ObatController::class, 'update']);
Route::get('/obat/{id}', [ObatController::class, 'show']);
Route::delete('/obat/{id}', [ObatController::class, 'destroy']);

// auth
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

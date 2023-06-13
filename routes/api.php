<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemApiController;
use App\Http\Controllers\AuthenticationAPIController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [AuthenticationAPIController::class, 'logout']);
    Route::get('/profile', [AuthenticationAPIController::class, 'profile']);

    Route::post('/item-add', [ItemApiController::class, 'store']);
    Route::post('/item-edit/{id}', [ItemApiController::class, 'update']);
    Route::delete('/item-delete/{id}', [ItemApiController::class, 'destroy']);
});

Route::get('/item-list', [ItemApiController::class, 'index']);
Route::get('/item-detail/{id}', [ItemApiController::class, 'show']);

Route::post('/login', [AuthenticationAPIController::class, 'login']);
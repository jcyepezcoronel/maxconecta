<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;

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


Route::prefix('clients')->group(function () {
    Route::get('/list', [ClientsController::class, 'list']);
    Route::post('/store', [ClientsController::class, 'store']);
    Route::get('/show', [ClientsController::class, 'show']);
    Route::post('/update', [ClientsController::class, 'update']);
    Route::post('/delete', [ClientsController::class, 'destroy']);
});

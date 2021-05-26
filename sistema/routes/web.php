<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Clientes
Route::get('/clientes', [HomeController::class, 'listClients'])->name('listClients');
Route::get('/cliente/editar/{id}', [HomeController::class, 'editClient'])->name('editClient');
Route::get('/clientes/registrar', [HomeController::class, 'registerClient'])->name('registerClient');
Route::get('/clientes/editar', [HomeController::class, 'editClient'])->name('editClient');


Route::apiResource('/clients', ClientsController::class);
Route::apiResource('/movies', MoviesController::class);
Route::apiResource('/rentals', RentalsController::class);
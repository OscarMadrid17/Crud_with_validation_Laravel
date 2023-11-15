<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clients',              [ClientController::class,   'index'])->name('index');

Route::get('clients/create',        [ClientController::class,   'create'])->name('client.create');

Route::post('clients/create',       [ClientController::class,   'store'])->name('client.store');

Route::delete('clients/{client}',   [ClientController::class,   'destroy'])->name('client.destroy');

Route::get('clients/{client}/edit', [ClientController::class,   'edit'])->name('client.edit');

Route::put('clients/{client}/edit', [ClientController::class,   'update'])->name('client.update');

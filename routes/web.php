<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\CarController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    $nome = "WESLEY";
    return view('welcome', ['nome' => $nome]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'getCar']);


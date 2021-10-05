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

Route::get('/cars', [CarController::class, 'index'])->middleware('auth');
Route::get('/cars/search', [CarController::class, 'search'])->middleware('auth');
Route::get('/cars/{id}', [CarController::class, 'show'])->middleware('auth');
Route::post('/cars', [CarController::class, 'store'])->middleware('auth');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

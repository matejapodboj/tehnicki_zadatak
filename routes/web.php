<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('login');
});

Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout']);
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('register', [UserController::class, 'register']);
Route::post('register', [UserController::class, 'store']);

Route::get('admin/dashboard', [UserController::class, 'adminDashboard']);
Route::post('import', [UserController::class, 'importBooks']);
Route::get('search', [BookController::class, 'search']);
Route::get('filter', [BookController::class, 'filter']);

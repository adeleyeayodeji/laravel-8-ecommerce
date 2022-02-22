<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User;
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

Route::get('/', [HomeController::class, 'home']);
Route::get('/auth', [HomeController::class, 'auth']);
Route::post('/auth/register', [HomeController::class, 'register']);
Route::post('/auth/login', [HomeController::class, 'login']);
//make route for dashboard
Route::get('/dashboard', [User::class, 'dashboard']);
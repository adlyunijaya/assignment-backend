<?php

use App\Http\Controllers\ImportExportController;
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

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

// Route::post('/login', [UserController::class, 'check-login'])->name('check-login');
// Route::post('/register', [UserController::class, 'register'])->name('register');

// Route::group(['prefix' => 'user'], function () {
    
//     Route::get('/', [UserController::class, 'getAll'])->name('all.user');
// });
Route::get('/export', [ImportExportController::class, 'export']);
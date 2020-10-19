<?php

use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/unauthorized', function () {
    return response()->json('unauthorized', 401);
})->name('unauthorized');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/getAll', [UserController::class, 'getAll']);
    
    Route::post('/importExcel', [ImportExportController::class, 'import']);
    Route::get('/exportExcel', [ImportExportController::class, 'export']);

    Route::post('/importUpdate', [ImportExportController::class, 'updateImport']);
    Route::post('/importDelete', [ImportExportController::class, 'deleteImport']);
});
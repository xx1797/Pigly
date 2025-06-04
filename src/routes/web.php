<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;

Route::middleware(['auth'])->group(function () {
    Route::get('/weight_logs', [WeightLogController::class, 'index']);
    Route::get('/weight_logs/create', [WeightLogController::class, 'create']);
    Route::post('/weight_logs', [WeightLogController::class, 'store']);
    Route::get('/weight_logs/search', [WeightLogController::class, 'search']);
    Route::get('/weight_logs/{id}', [WeightLogController::class, 'show']);
    Route::get('/weight_logs/{id}/update', [WeightLogController::class, 'edit']);
    Route::put('/weight_logs/{id}', [WeightLogController::class, 'update']);
    Route::delete('/weight_logs/{id}', [WeightLogController::class, 'destroy']);
});

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

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

//Sanctum API zascita route-a primer (neoverjen uporabnik) - overjanje pooblascenih uporabnikov = testingapi -> "personal_access_tokens"
Route::group(['middleware' => ['auth:sanctum']], function() {
    //Route::get('/orders', [OrderController::class, 'index']);
});

Route::get('/orders', [OrderController::class, 'index']);
Route::prefix('/order')->group(function () {
    Route::post('/store', [OrderController::class, 'store']);
    Route::put('/{id}', [OrderController::class, 'update']);
    Route::delete('/{id}', [OrderController::class, 'destroy']);
});

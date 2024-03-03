<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});

Route::group(['middleware' => 'jwt.auth', 'prefix' => '/tasks'], function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::post('/store', [TaskController::class, 'store']);
    Route::get('/show/{task}', [TaskController::class, 'show']);
    Route::post('/update/{task}', [TaskController::class, 'update']);
    Route::get('/delete/{task}', [TaskController::class, 'delete']);
});

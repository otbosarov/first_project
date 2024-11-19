<?php

use App\Http\Controllers\IncomeExpanseController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserBalanceController;
use App\Http\Controllers\UserController;
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

Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);

Route::group(['middleware'=>'auth:sanctum'],function(){

    Route::put('user/update/{id}', [UserController::class, 'update']);

    Route::get('type/show', [TypeController::class, 'index']);
    Route::post('type/create', [TypeController::class, 'store']);
    Route::put('type/update/{id}', [TypeController::class, 'update']);
    Route::delete('type/delete/{id}', [TypeController::class, 'destroy']);

    Route::get('balans/show', [UserBalanceController::class, 'index']);
    Route::post('balans/create', [UserBalanceController::class, 'store']);
    Route::put('balans/update/{id}', [UserBalanceController::class, 'update']);
    Route::delete('balans/delete/{id}', [UserBalanceController::class, 'destroy']);

    Route::get('income/expanse/show', [IncomeExpanseController::class, 'index']);
    // Route::post('income/expanse/create', [IncomeExpanseController::class, 'store']);
    Route::post('income/expanse/create', [IncomeExpanseController::class, 'store']);
    Route::put('income/expanse/update/{id}', [IncomeExpanseController::class, 'update']);
    Route::delete('income/expanse/delete/{id}', [IncomeExpanseController::class, 'destroy']);
});



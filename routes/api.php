<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;

Route::post('/auth/login', [AuthController::class, 'login']);



// Route::post('/categories/{id}', [CategoryController::class, 'destory']);


Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
});

<?php

use App\Http\Controllers\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Get api for fetch data
Route::get('/users/{id?}', [UserApiController::class, 'showUser']);

// Post api for add data
Route::post('/add-user', [UserApiController::class, 'addUser']);
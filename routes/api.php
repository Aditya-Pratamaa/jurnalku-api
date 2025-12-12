<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ROUTE STUDENTS CRUD
Route::apiResource('students', StudentController::class);

// LOGIN
Route::post('/login', [AuthController::class, 'login']);

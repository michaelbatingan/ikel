<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return 'Hello, from Laravel!';
});

//http://localhost:8000/api/employees
Route::get('/employees', [\App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('/employees', [\App\Http\Controllers\EmployeeController::class, 'store']);
//http://localhost:8000/api/employees/2
Route::get('/employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'show']);
Route::put('/employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'destroy']);

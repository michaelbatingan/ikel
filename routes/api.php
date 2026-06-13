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

//http://localhost:8000/api/pensioners
Route::get('/pensioners', [\App\Http\Controllers\PensionerController::class, 'index']);
Route::post('/pensioners', [\App\Http\Controllers\PensionerController::class, 'store']);
//http://localhost:8000/api/pensioners/2
Route::get('/pensioners/{id}', [\App\Http\Controllers\PensionerController::class, 'show']);
Route::put('/pensioners/{id}', [\App\Http\Controllers\PensionerController::class, 'update']);
Route::delete('/pensioners/{id}', [\App\Http\Controllers\PensionerController::class, 'destroy']);

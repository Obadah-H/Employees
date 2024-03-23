<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers;
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


Route::prefix('employees')->group(function () {
        Route::post('/add', 'App\Http\Controllers\EmployeeController@add');
        Route::patch('/update', 'App\Http\Controllers\EmployeeController@update');
        Route::delete('/delete', 'App\Http\Controllers\EmployeeController@delete');

        Route::get('/id/{employee_id}', 'App\Http\Controllers\EmployeeController@get');
        Route::get('/all', 'App\Http\Controllers\EmployeeController@getAll');
});

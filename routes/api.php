<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("home",[EmployeeController::class,'index'])->name('index');
Route::post("upload",[EmployeeController::class,'upload'])->name('upload');
Route::get('edit/{id}', [EmployeeController::class, 'edit']);
Route::get('delete/{id}', [EmployeeController::class, 'delete']);
Route::post('update', [EmployeeController::class, 'update']);



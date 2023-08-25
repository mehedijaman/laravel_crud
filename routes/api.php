<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/create',  [StudentController::class, 'create']);
Route::post('/student/store',  [StudentController::class, 'store']);
Route::post('/student/destory/{id}',  [StudentController::class, 'destroy']);
Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::post('/student/update/{id}', [StudentController::class, 'update']);

Route::get('/todo', [TodoController::class,'index']);
Route::post('/todo/store', [TodoController::class,'store']);
Route::get('/todo/edit/{id}', [TodoController::class,'edit']);
Route::post('/todo/update/{id}', [TodoController::class,'update']);
Route::post('/todo/destroy/{id}', [TodoController::class,'destroy']);
Route::post('/todo/done/{id}', [TodoController::class,'done']);
Route::post('/todo/undo/{id}', [TodoController::class,'undo']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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

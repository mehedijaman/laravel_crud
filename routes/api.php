<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

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

Route::group(['prefix' => 'student'], function(){
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/create',  [StudentController::class, 'create']);
    Route::get('/show/{id}',  [StudentController::class, 'show']);
    Route::post('/store',  [StudentController::class, 'store']);
    Route::post('/destory/{id}',  [StudentController::class, 'destroy']);
    Route::get('/edit/{id}', [StudentController::class, 'edit']);
    Route::post('/update/{id}', [StudentController::class, 'update']);
});


Route::group(['prefix' => '/todo'], function(){
    Route::get('/', [TodoController::class,'index']);
    Route::post('/store', [TodoController::class,'store']);
    Route::get('/show/{id}', [TodoController::class,'show']);
    Route::get('/edit/{id}', [TodoController::class,'edit']);
    Route::post('/update/{id}', [TodoController::class,'update']);
    Route::post('/destroy/{id}', [TodoController::class,'destroy']);
    Route::post('/done/{id}', [TodoController::class,'done']);
    Route::post('/undo/{id}', [TodoController::class,'undo']);
});


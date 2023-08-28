<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/todo', [TodoController::class,'index']);
Route::post('/todo/store', [TodoController::class,'store']);
Route::post('/todo/edit/{id}', [TodoController::class,'edit']);
Route::post('/todo/update/{id}', [TodoController::class,'update']);
Route::post('/todo/destroy/{id}', [TodoController::class,'destroy']);
Route::post('/todo/done/{id}', [TodoController::class,'done']);
Route::post('/todo/undo/{id}', [TodoController::class,'undo']);

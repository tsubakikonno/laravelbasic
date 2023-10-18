<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;





Route::get('/', [TodoController::class, 'index'])->middleware('auth');
Route::post('/', [TodoController::class, 'post']);
Route::post('create', [TodoController::class, 'create']);
Route::post('delete', [TodoController::class, 'delete'])->name('/');
Route::post('/update', [TodoController::class, 'update'])->name('/');

Route::get('/search', [TodoController::class, 'find']);
Route::post('/search', [TodoController::class, 'search']);

Route::post('/logout', [TodoController::class, 'destroy']);

require __DIR__.'/auth.php';

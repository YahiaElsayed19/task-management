<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::resource('auth', AuthController::class)->only(['create', 'store', 'destroy']);
Route::get('login', fn() => to_route('auth.create'))->name('login');

Route::middleware('auth')->group(function () {
    Route::resource('task', TaskController::class);
    Route::get('/', fn() => to_route('task.index'));
});

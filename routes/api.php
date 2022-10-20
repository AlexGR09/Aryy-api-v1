<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::get('/profile', 'show')->middleware(['auth:sanctum']);
    Route::put('/profile', 'update')->middleware(['auth:sanctum']);
    Route::delete('/profile', 'destroy')->middleware(['auth:sanctum']);
    Route::get('/logout', 'logout')->middleware(['auth:sanctum']); 
 });
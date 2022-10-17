<?php

use App\Http\Controllers\CVController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CVController::class, 'index']);
Route::get('/cv/{id}', [CVController::class, 'showOneCV']);
Route::get('/pdf/{id}', [CVController::class, 'generatePdf']);
Route::get('/add', [CVController::class, 'showForm']);
Route::post('/add', [CVController::class, 'store']);
Route::post('/edit/{id}', [CVController::class, 'update']);
Route::get('/edit/{id}', [CVController::class, 'edit']);
Route::post('/destroy', [CVController::class, 'destroy']);

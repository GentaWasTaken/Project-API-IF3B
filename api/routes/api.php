<?php

use App\Http\Controllers\API\FakultasController;
use App\Http\Controllers\API\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/fakultas', [FakultasController::class, 'index']);
Route::get('/prodi', [ProdiController::class, 'index']);
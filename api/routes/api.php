<?php

use App\Http\Controllers\API\FakultasController;
use App\Http\Controllers\API\ProdiController;
use App\Http\Controllers\API\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/fakultas', [FakultasController::class, 'index']);
Route::get('/prodi', [ProdiController::class, 'index']);

Route::post("/fakultas", [FakultasController::class, "store"]);
Route::post("/prodi", [ProdiController::class, "store"]);

Route::get("/mahasiswa", [MahasiswaController::class, "index"]);
Route::post("/mahasiswa", [MahasiswaController::class, "store"]);
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
Route::get("/mahasiswa", [MahasiswaController::class, "index"]);

Route::post("/fakultas", [FakultasController::class, "store"]);
Route::post("/prodi", [ProdiController::class, "store"]);
Route::post("/mahasiswa", [MahasiswaController::class, "store"]);



Route::patch("/fakultas/{fakultas}", [FakultasController::class, "update"]);
Route::patch("/prodi/{prodi}", [ProdiController::class, "update"]);
Route::patch("/mahasiswa/{mahasiswa}", [MahasiswaController::class, "update"]);


Route::delete("/fakultas/{fakultas}", [FakultasController::class, "destroy"]);
Route::delete("/prodi/{prodi}", [ProdiController::class, "destroy"]);
Route::delete("/mahasiswa/{mahasiswa}", [MahasiswaController::class, "destroy"]);
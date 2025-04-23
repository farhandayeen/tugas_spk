<?php

use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HasilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kriterias', KriteriaController::class);
Route::resource('alternatifs', AlternatifController::class);
Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Route;

Route::controller(JogoController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});


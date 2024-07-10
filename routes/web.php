<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\HomeController@index');

Route::resource('jogo','App\Http\Controllers\JogoController');

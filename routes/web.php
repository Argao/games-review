<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\HomeController@index')->name('home');
Route::get('/detalhes/{jogo}','App\Http\Controllers\HomeController@detalhes')->name('home.detalhes');


Route::resource('jogo', 'App\Http\Controllers\JogoController');
Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('genero', 'App\Http\Controllers\GeneroController');
Route::resource('produtora', 'App\Http\Controllers\ProdutoraController');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

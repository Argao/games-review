<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\HomeController@index');


Route::get('/jogo/show/{id}','App\Http\Controllers\JogoController@show')->name('jogo.show');


Route::post('/login','App\Http\Controllers\LoginController@autenticar')->name('login');
Route::get('/login/${erro?}','App\Http\Controllers\LoginController@index')->name('login');




Route::prefix('/app')->group(function () {

    // Subgrupo com middleware 'autenticacao' e parâmetro 'editor'
    Route::middleware('autenticacao:editor')->group(function () {
        Route::get('/usuario/edit/{id}','App\Http\Controllers\UsuarioController@edit')->name('usuario.edit');
        Route::put('/usuario/update/{id}','App\Http\Controllers\UsuarioController@update')->name('usuario.update');

        Route::get('/jogo','App\Http\Controllers\JogoController@index')->name('jogo.index');
        Route::get('/jogo/edit/{jogo}','App\Http\Controllers\JogoController@edit')->name('jogo.edit');
        Route::put('/jogo/update/{jogo}','App\Http\Controllers\JogoController@update')->name('jogo.update');
    });

    // Subgrupo com middleware 'autenticacao' e parâmetro 'admin'
    Route::middleware('autenticacao:admin')->group(function () {
        Route::get('/usuario/create','App\Http\Controllers\UsuarioController@create')->name('usuario.create');
        Route::post('/usuario/store','App\Http\Controllers\UsuarioController@store')->name('usuario.store');
        Route::delete('/usuario/destroy/{id}','App\Http\Controllers\UsuarioController@destroy')->name('usuario.destroy');

        Route::get('/jogo/create','App\Http\Controllers\JogoController@create')->name('jogo.create');
        Route::post('/jogo/store','App\Http\Controllers\JogoController@store')->name('jogo.store');
        Route::delete('/jogo/destroy/{id}','App\Http\Controllers\JogoController@destroy')->name('jogo.destroy');
    });

    // Rotas que não requerem parâmetros específicos no middleware podem ser adicionadas fora dos subgrupos
    Route::get('/sair', 'App\Http\Controllers\LoginController@sair')->name('app.sair');
});

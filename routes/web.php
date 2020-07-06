<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('', 'GameController@list_game');
    Route::get('create', 'GameController@detail_game');
    Route::get('edit', 'GameController@detail_game');
    Route::post('save', 'GameController@save_game');
    Route::delete('delete/{id}', 'GameController@destroy_game');
});

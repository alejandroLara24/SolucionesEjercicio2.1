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

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Rutas de prueba para generar y editar posts automáticamente
Route::get('posts/nuevoPrueba', 'PostController@nuevoPrueba')->name('nuevoPrueba');
Route::get('posts/editarPrueba/{id}', 'PostController@editarPrueba')->name('editarPrueba');

Route::resource('posts', 'PostController');

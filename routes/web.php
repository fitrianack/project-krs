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
    return view('welcome');
});

Route::get('/mahasiswa/show', 'MahasiswaController@show');
Route::get('/mahasiswa/create', 'MahasiswaController@create');
Route::post('/mahasiswa/create', 'MahasiswaController@tambah');

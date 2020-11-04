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

Route::get('index-dosen', 'DosenController@index')->name('index-dosen');
Route::get('create-dosen', 'DosenController@create')->name('create-dosen');
Route::post('create-proses-dosen', 'DosenController@store')->name('create-proses-dosen');
Route::get('update-dosen/{kode_dosen}', 'DosenController@edit')->name('update-dosen');
Route::post('update-proses-dosen/{kode_dosen}', 'DosenController@update')->name('update-proses-dosen');
Route::get('hapus-dosen/{kode_dosen}', 'DosenController@destroy')->name('hapus-dosen');

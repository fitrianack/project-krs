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

<<<<<<< HEAD
Route::get('/mahasiswa/show', 'MahasiswaController@show');
Route::get('/mahasiswa/create', 'MahasiswaController@create');
Route::post('/mahasiswa/create', 'MahasiswaController@tambah');
=======
//--------------------------------------SISI ADMIN-----------------------

// Role user
Route::get('/dashboard', 'AdminController@home');
Route::get('/role', 'AdminController@tampilrole');
Route::get('/role/create', 'AdminController@create_role');
Route::post('/role/create', 'AdminController@store_role');
Route::get('/role/edit/{id}', 'AdminController@edit_role');
Route::post('/role/update', 'AdminController@update_role');
Route::get('/role/delete/{id}', 'AdminController@delete_role');

// Fitur Mata Kuliah
Route::get('/matkul', 'AdminController@tampilmatkul');
Route::get('/matkul/create', 'AdminController@create_matkul');
Route::post('/matkul/create', 'AdminController@store_matkul');
Route::get('/matkul/edit/{kode_matkul}', 'AdminController@edit_matkul');
Route::post('/matkul/update', 'AdminController@update_matkul');
Route::get('/matkul/delete/{kode_matkul}', 'AdminController@delete_matkul');

//Fitur Login
Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 1cf5e73221119c71f529f478c4e2c204b1a50cd6

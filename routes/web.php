<?php

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

// pegawai
Route::get('pegawai', 'PegawaiController@index');
Route::get('pegawai/tambah', 'PegawaiController@create');
Route::post('pegawai/store', 'PegawaiController@store');
Route::get('pegawai/edit/{nip}', 'PegawaiController@edit');
Route::get('pegawai/hapus/{nip}', 'PegawaiController@destroy');
Route::post('pegawai/update', 'PegawaiController@update');
Route::get('pegawai/detail/{nip}', 'PegawaiController@detail');

//pasangan
Route::get('pegawai/detail/{nip}/pasangan', 'PasanganController@index');
Route::post('pegawai/detail/{nip}/pasangan/create', 'PasanganController@create');
Route::post('pegawai/detail/{nip}/pasangan/update', 'PasanganController@update');

// anak
Route::get('pegawai/detail/{nip}/anak', 'AnakController@index');
Route::post('pegawai/detail/{nip}/anak/create', 'AnakController@create');
Route::post('pegawai/detail/{nip}/anak/update', 'AnakController@update');

// riwayat pekerjaan
Route::get('pegawai/detail/{nip}/pekerjaan', 'PekerjaanController@index');
Route::post('pegawai/detail/{nip}/pekerjaan/create', 'PekerjaanController@create');
Route::post('pegawai/detail/{nip}/pekerjaan/update', 'PekerjaanController@update');

// ayah
Route::get('pegawai/detail/{nip}/ayah', 'AyahController@index');
Route::post('pegawai/detail/{nip}/ayah/create', 'AyahController@create');
Route::post('pegawai/detail/{nip}/ayah/update', 'AyahController@update');

//ibu
Route::get('pegawai/detail/{nip}/ibu', 'IbuController@index');
Route::post('pegawai/detail/{nip}/ibu/create', 'IbuController@create');
Route::post('pegawai/detail/{nip}/ibu/update', 'IbuController@update');


Route::view('test', 'pegawai.index');

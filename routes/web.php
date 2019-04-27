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
Route::get('pegawai', 'PegawaiController@index')->name('home');
Route::get('pegawai/tambah', 'PegawaiController@create')->name('tambah_pegawai');
Route::post('pegawai/store', 'PegawaiController@store');
Route::get('pegawai/edit/{nip}', 'PegawaiController@edit')->name('edit_pegawai');
Route::get('pegawai/hapus/{nip}', 'PegawaiController@destroy')->name('hapus_pegawai');
Route::post('pegawai/update', 'PegawaiController@update');
Route::get('pegawai/detail/{nip}', 'PegawaiController@detail');
// Route::resource('pegawai', 'PegawaiController');~

//pasangan
Route::resource('pegawai/detail/pasangan', 'PasanganController')->parameters([
    'pegawai/detail/pasangan' => 'nip',
]);
Route::get('pegawai/detail/pasangan/{pasangan}', 'PasanganController@create')->name('pasangan.add');

// anak
Route::resource('pegawai/detail/anak', 'AnakController')->parameters([
    'pegawai/detail/anak' => 'nip',
]);
Route::get('pegawai/detail/anak/{anak}', 'AnakController@create')->name('anak.add');

// riwayat pekerjaan
Route::resource('pegawai/detail/pekerjaan', 'PekerjaanController')->parameters([
    'pegawai/detail/pekerjaan' => 'nip'
]);
Route::get('pegawai/detail/pekerjaan/{pekerjaan}', 'PekerjaanController@create')->name('pekerjaan.add');

// ayah
Route::resource('pegawai/detail/ayah', 'AyahController')->parameters([
    'pegawai/detail/ayah' => 'nip'
]);
Route::get('pegawai/detail/ayah/{ayah}', 'AyahController@create')->name('ayah.add');

//ibu
Route::resource('pegawai/detail/ibu', 'IbuController')->parameters([
    'pegawai/detail/ibu' => 'nip'
]);
Route::get('pegawai/detail/ibu/{ibu}', 'IbuController@create')->name('ibu.add');


// Route::get('test', 'PegawaiController@index');
// Route::post('test/create', 'AnakController@bikin');
// // Route::get('test/home', 'PegawaiController@index');

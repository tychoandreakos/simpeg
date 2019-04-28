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
Route::resource('pegawai', 'PegawaiController')->parameters([
    'pegawai' => 'nip',
]);
Route::get('pegawai/{nip}/detail', 'PegawaiController@show')->name('pegawai.detail');
Route::get('pegawai/{nip}/hapus', 'PegawaiController@destroy')->name('pegawai.destroys');
Route::get('pegawai/{nip}/cetak-semua', 'PegawaiController@print')->name('pegawai.print');
Route::get('pegawai/{nip}/cetak', 'PegawaiController@printShortly')->name('pegawai.printShortly');

//pasangan
Route::resource('pegawai/detail/pasangan', 'PasanganController')->parameters([
    'pegawai/detail/pasangan' => 'nip',
]);
Route::get('pegawai/detail/pasangan/{pasangan}', 'PasanganController@create')->name('pasangan.add');

// anak
Route::resource('pegawai/detail/anak', 'AnakController')->parameters([
    'pegawai/detail/anak' => 'nip',
]);
Route::get('pegawai/detail/anak/{anak}/create', 'AnakController@create')->name('anak.add');
Route::get('pegawai/detail/anak/{anak}/show', 'AnakController@show')->name('anak.show');
Route::get('pegawai/detail/anak/{nip}/{anak}/hapus', 'AnakController@destroy')->name('anak.destroys');

// riwayat pekerjaan
Route::resource('pegawai/detail/pekerjaan', 'PekerjaanController')->parameters([
    'pegawai/detail/pekerjaan' => 'nip'
]);
Route::get('pegawai/detail/pekerjaan/{pekerjaan}', 'PekerjaanController@create')->name('pekerjaan.add');
Route::get('pegawai/detail/pekerjaan/{pekerjaan}/show', 'PekerjaanController@show')->name('pekerjaan.show');
Route::get('pegawai/detail/pekerjaan/{nip}/{pekerjaan}/hapus', 'PekerjaanController@destroy')->name('pekerjaan.destroys');

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


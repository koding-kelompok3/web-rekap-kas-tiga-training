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

Auth::routes([
    'register' => false,
    'reset' => false,
]);

// Rute Admin with prefix and middleware
Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function () {
    // Rute Admin Home
    Route::get('/', 'AdminController@index')->name('admin');

    // Rute Setting Akun
    Route::get('/akun', 'AdminController@setting_akun')->name('setting.akun');
    Route::put('/akun/update/{id}', 'AdminController@update_akun')->name('update.akun');
    Route::put('/akun/password/{id}', 'AdminController@update_password');

    // Rute User / Bendahara
    Route::get('/get_data_user/{id}', 'AdminController@get_data_user');
    Route::get('/user', 'AdminController@user')->name('user');
    Route::get('/user/show/{id}', 'AdminController@user_show')->name('user.show');
    Route::post('/user/store', 'AdminController@user_store')->name('user.store');
    Route::put('/user/update/{id}', 'AdminController@user_update')->name('user.update');
    Route::get('/user/delete/{id}', 'AdminController@user_delete')->name('user.delete');

    // Rute Siswa
    // Route::get('/get_data_siswa/{id}', 'AdminController@get_data_siswa');
    Route::get('/siswa', 'AdminController@siswa')->name('siswa');
    Route::get('/siswa/{id}', 'AdminController@siswa_show')->name('siswa.show');

    // Rute Riwayat
    Route::get('/riwayat', 'AdminController@riwayat');
    // Route::get('/riwayat/delete_all', 'AdminController@riwayat_delete');

    // Rute Pembayaran
    Route::get('/pembayaran/masuk', 'AdminController@pembayaran_masuk');
    Route::get('/pembayaran/masuk/{id}', 'AdminController@pembayaran_show_masuk');
    Route::get('/kas/masuk/cetak_kas_masuk', 'AdminController@cetak_kas_masuk_all');
    Route::get('/pembayaran/masuk/cetak_pdf/{id}', 'AdminController@cetak_pembayaran_masuk');

    Route::get('/pembayaran/keluar', 'AdminController@pembayaran_keluar');
    Route::get('/pembayaran/keluar/{id}', 'AdminController@pembayaran_show_keluar');
    Route::get('/kas/keluar/cetak_kas_keluar', 'AdminController@cetak_kas_keluar_all');
    Route::get('/pembayaran/keluar/cetak_pdf/{id}', 'AdminController@cetak_pembayaran_keluar');

    // Rute Pesan
    Route::get('/pesan', 'AdminController@pesan');
    Route::put('/pesan/{id}', 'AdminController@pesan_read');

    // Rute Multimedia
    Route::get('/multimedia', 'AdminController@multimedia_index');
    Route::post('/multimedia/store', 'AdminController@multimedia_store');
    Route::get('/multimedia/delete/{id}', 'AdminController@multimedia_delete');
});


// Rute user with prefix and middleware
Route::group(['prefix' => 'user',  'middleware' => 'bendahara'], function () {
    // Rute Bendahara Home
    Route::get('/', 'BendaharaController@index');

    // Rute Setting Akun
    Route::get('/akun', 'BendaharaController@setting_akun')->name('setting.akun.user');
    Route::put('/akun/update/{id}', 'BendaharaController@update_akun')->name('update.akun.user');

    // Rute Siswa
    Route::get('/siswa', 'BendaharaController@siswa');
    Route::post('/siswa/store', 'BendaharaController@siswa_store')->name('siswa.store');
    // Route::get('/siswa/delete/{id}', 'BendaharaController@siswa_delete');

    // Rute Riwayat
    Route::get('/riwayat', 'BendaharaController@riwayat');
    // Route::get('/riwayat/delete_all', 'BendaharaController@riwayat_delete');

    // Rute Pembayaran
    Route::get('/pembayaran', 'BendaharaController@pembayaran');
    Route::get('/pembayaran/show/{nama}', 'BendaharaController@pembayaran_user');
    Route::post('/pembayaran/store', 'BendaharaController@pembayaran_store');
    Route::get('/pembayaran/delete/{id}', 'BendaharaController@pembayaran_delete');

    // Rute Bayar masuk & keluar
    Route::get('/pembayaran/masuk', 'BendaharaController@pembayaran_masuk');
    Route::get('/pembayaran/keluar', 'BendaharaController@pembayaran_keluar');
    Route::post('/pembayaran/keluar/store', 'BendaharaController@pembayaran_keluar_store');
    // Route::get('/pembayaran/delete/{id}', 'BendaharaController@pembayaran_keluar_delete');

    // Rute Cetak PDF
    Route::get('/pembayaran/kas-masuk/cetak_pdf', 'BendaharaController@cetak_kas_masuk');
    Route::get('/pembayaran/kas-keluar/cetak_pdf', 'BendaharaController@cetak_kas_keluar');
    Route::get('/pembayaran/{id}/kas-masuk-siswa/cetak_pdf', 'BendaharaController@cetak_kas_masuk_siswa');

    // Rute Pesan
    Route::get('/pesan', 'BendaharaController@pesan');
    Route::get('/pesan/create', 'BendaharaController@pesan_create');
    Route::post('/pesan/store', 'BendaharaController@pesan_store');
    Route::get('/get_data_pesan/{id}', 'BendaharaController@get_data_pesan');
});

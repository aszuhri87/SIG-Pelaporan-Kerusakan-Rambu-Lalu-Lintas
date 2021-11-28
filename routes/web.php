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

Route::get('/', 'WelcomeController@index');

Route::get('welcome', 'WelcomeController@index');
Route::get('/berita', 'WelcomeController@index');
Route::get('/autentikasi', 'WelcomeController@captcha');
Route::post('/captcha-validation', 'WelcomeController@capthcaFormValidate');
Route::get('/reload-captcha', 'WelcomeController@reloadCaptcha');

Auth::routes();
Route::resource('auth', 'UserController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
Route::get('/data_laporan', 'AdminController@data_laporan')->name('data_laporan');
Route::post('/data_laporan', 'AdminController@data_laporan')->name('data_laporan');
Route::get('/data_pelapor', 'AdminController@data_pelapor')->name('data_pelapor');
Route::get('/data_petugas', 'AdminController@data_petugas')->name('data_petugas');
Route::get('/recycle', 'AdminController@recycle')->name('recycle');
Route::get('/recycle/restore/{id_laporan}', 'AdminController@restore');

Route::get('/tentang_kami', 'WelcomeController@about');

// Route::get('/form_pelapor', 'PelaporController@index')->name('form_pelapor');

//petugas
Route::POST('simpanpetugas', 'AdminController@simpanpetugas')->name('simpanpetugas');
Route::get('editpetugas', 'AdminController@editpetugas')->name('editpetugas');
Route::POST('updatepetugas', 'AdminController@updatepetugas')->name('updatepetugas');
// Route::get('hapuspetugas/{id_petugas}', 'AdminController@hapuspetugas')->name('hapuspetugas');
Route::get('hapetugas', 'AdminController@hapetugas')->name('hapetugas');
Route::post('hapuspetugas', 'AdminController@hapuspetugas')->name('hapuspetugas');
//rambu
Route::get('/data_perbaikan', 'AdminController@data_perbaikan')->name('data_perbaikan');
Route::post('/data_perbaikan', 'AdminController@data_perbaikan')->name('data_perbaikan');
Route::post('simpanrambu', 'AdminController@simpanrambu')->name('simpanrambu');
Route::get('edit_status', 'AdminController@edit_status')->name('edit_status');
Route::post('ubah_status/{id_laporan}', 'AdminController@ubah_status')->name('ubah_status');
Route::get('hapusrambu/{id_rambu}', 'AdminController@hapusrambu')->name('hapusrambu');

Route::get('/form_pelapor', 'TampilMapController@index')->name('form_pelapor');
Route::get('/laporan/data', 'DataController@laporan')->name('laporan.data'); // DATA TABLE CONTROLLER
Route::post('/simpan_laporan', 'PlaceController@store')->name('simpan_laporan');
Route::get('/hapus_laporan/{id_laporan}', 'PlaceController@destroy')->name('hapus_laporan');
Route::get('/recycle/hapus_permanen/{id_laporan}', 'AdminController@permanent_delete');

Route::get('/detail/{id_pelapor}', 'PelaporController@show');

Route::get('verifikasi','AuthOtpController@show')->name('verifikasi');
Route::post('verifikasi','AuthOtpController@verify')->name('verifikasi');

Route::group(['middleware' => ['auth']], function () {
	Route::resource('laporan', 'PlaceController');
});

Route::POST('tambah_akun', 'UserController@tambah_akun')->name('tambah_akun');



Route::get('/about', function () {
	return view('admin/about');
})->name('about');

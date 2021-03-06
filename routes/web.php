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

Auth::routes();

Route::resource('spp', 'SppController');
Route::resource('kelas', 'KelasController');
Route::resource('petugas', 'PetugasController');
Route::resource('siswa', 'SiswaController');
Route::resource('pembayaran', 'PembayaranController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

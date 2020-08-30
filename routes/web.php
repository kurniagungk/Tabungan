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


Route::group(['middleware' => ['role:admin']], function () {
    Route::livewire('/home', 'index');


    Route::get('/nasabah', function () {
        return view('livewire.nasabah.index');
    });


    Route::livewire('/setor', 'setor.index');
    Route::livewire('/tarik', 'tarik.index');


    Route::livewire('/mitra', 'mitra.index')->name("mitra.index");
    Route::livewire('/mitra/tarik', 'mitra.tariksaldo');
    Route::livewire('/mitra/create', 'mitra.create')->name('mitra.create');
    Route::livewire('/mitra/{mitra}/edit', 'mitra.edit')->name('mitra.edit');
    Route::livewire('/mitrapay', 'transaksimitra.create')->name('mitrapay')->layout('layouts.pembayaran');

    Route::livewire('/nasabah/create', 'nasabah.create')->name('nasabah.create');
    Route::livewire('/nasabah', 'nasabah.index')->name('nasabah.index');
    Route::livewire('/nasabah/{nasabah}/edit', 'nasabah.edit')->name('nasabah.edit');


    Route::livewire('/laporanumum', 'laporan.umum')->name('laporan.umum');

    Route::livewire('/user', 'admin.account')->name('admin.account');


    Route::get('/tarikmitra', function () {
        return view('livewire.mitra.tariksaldo');
    });
    Route::get('/laporanmitra', function () {
        return view('livewire.laporan.mitra');
    });
    Route::get('/laporanmutasi', function () {
        return view('livewire.laporan.mutasi');
    });
    Route::get('/mitrahistory', function () {
        return view('livewire.transaksimitra.index');
    });
});


Route::group(['middleware' => ['role:mitra']], function () {
    Route::livewire('/home', 'index');
    Route::livewire('/mitra', 'mitra.index')->name("mitra.index");
    Route::livewire('/mitra/tarik', 'mitra.tariksaldo');
    Route::livewire('/mitra/create', 'mitra.create')->name('mitra.create');
    Route::livewire('/mitra/{mitra}/edit', 'mitra.edit')->name('mitra.edit');
    Route::livewire('/mitrapay', 'transaksimitra.create')->name('mitrapay')->layout('layouts.pembayaran');
    Route::livewire('/laporanumum', 'laporan.umum')->name('laporan.umum');
    Route::get('/laporanmitra', function () {
        return view('livewire.laporan.mitra');
    });
    Route::get('/laporanmutasi', function () {
        return view('livewire.laporan.mutasi');
    });
    Route::get('/mitrahistory', function () {
        return view('livewire.transaksimitra.index');
    });
});

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

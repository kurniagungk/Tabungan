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

Route::get('/', function () {
    return view('test');
});

// route::prefix('tabungan')->group(function () {
//     Route::get('/', 'tabungan@index');
//     Route::get('/create', 'tabungan@create');
// });

Route::get('/nasabah', function () {
    return view('livewire.nasabah.index');
});

Route::get('/setor', function () {
    return view('livewire.setor.index');
});

Route::livewire('/setor', 'setor.index');


Route::get('/mitra', function () {
    return view('livewire.mitra.index');
});

Route::get('/laporanumum', function () {
    return view('livewire.laporan.umum');
});

Route::get('/laporanmitra', function () {
    return view('livewire.laporan.mitra');
});

Route::get('/laporanmutasi', function () {
    return view('livewire.laporan.mutasi');
});

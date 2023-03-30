<?php

use App\Http\Controllers\cucianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TabelPengaduanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PetugazController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\LaporanBugController;
use App\Http\Controllers\laundryController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\toController;
use App\Http\Controllers\UjikomController;
use Illuminate\Support\Facades\Route;

Route::resource('home', HomeController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('tables', TablesController::class);
Route::resource('simulasiTransaksi', UjikomController::class);
Route::resource('tabelpengaduan', TabelPengaduanController::class);
Route::resource('pengaduan',PengaduanController::class);
Route::resource('guru',GuruController::class);
Route::get('export/guru',[GuruController::class,'exportData'])->name('export-guru');
Route::post('guru/import',[GuruController::class,'importData'])->name('import-guru');
Route::resource('petugaz',PetugazController::class);
Route::resource('simulasi',SimulasiController::class);
Route::resource('laundry',laundryController::class);
Route::resource('to',toController::class);
Route::resource('kehadiran', KehadiranController::class);
Route::get('export/kehadiran', [kehadiranController::class, 'exportData'])->name('export-kehadiran');
Route::post('kehadiran/import', [KehadiranController::class, 'importData'])->name('import-kehadiran');
Route::resource('cucian', cucianController::class);
Route::resource('laporanbug', LaporanBugController::class);
Route::get('export/laporanbug', [LaporanBugController::class, 'exportData'])->name('export-laporanbug');
Route::post('laporanbug/import', [LaporanBugController::class, 'importData'])->name('import-laporanbug');



Route::controller(RegisterController::class)->group(function(){
    route::get('register','index');
    route::post('proses','proses');
});

// Route::controller(PetugasController::class)->group(function(){
//     route::get('input_petugas','index')->name('petugas');
//     route::post('proses','proses');
// });

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/proses','proses');
    Route::get('logout','logout')->name('logout');

});

    Route::group(['middleware'=> ['auth']],function(){
        Route::group(['middleware'=>['CekUserLogin:1']], function(){
            Route::resource('index',index::class);
        });
        
        Route::group(['middleware'=>['CekUserLogin:2']], function(){
            Route::resource('pengaduan_pekerja',pengaduan_pekerja::class);
        });

        Route::group(['middleware'=>['CekUserLogin:3']], function(){
            Route::resource('index',index::class);
        });



});
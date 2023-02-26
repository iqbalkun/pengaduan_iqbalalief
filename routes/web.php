<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TabelPengaduanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::resource('home', HomeController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('tables', TablesController::class);
Route::resource('tabelpengaduan', TabelPengaduanController::class);


Route::controller(RegisterController::class)->group(function(){
    route::get('register','index')->name('login');
    route::post('proses','proses');
});


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

    Route::post('simpan_pengaduan',[PengaduanController::class,'store'])->name('simpan_pengaduan');
        

});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;


use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\Penilaian1Controller;
use App\Http\Controllers\Penilaian2Controller;
use App\Http\Controllers\Penilaian3Controller;
use App\Http\Controllers\Penilaian4Controller;


use App\Http\Controllers\Moodle\MlCourseController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('dashboard')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('/pelatihan', PelatihanController::class);
    Route::resource('/peserta', PesertaController::class);
    Route::post('/import/peserta/pelatihan', [PesertaController::class, 'import_excel'])->name('importPesertaPelatihan');

    Route::prefix('penilaian')->group(function(){
        Route::get('/{id}', [PenilaianController::class, 'halaman_penilaian'])->name('formulirPenilaian');
        Route::resource('penilaian-naskah1', Penilaian1Controller::class);
        Route::get('form-penilaian1/{id}/{kelompok}',[Penilaian1Controller::class, 'isi_penilaian1'])->name('isiPenilaian1');
        ///
        Route::resource('penilaian-naskah2', Penilaian2Controller::class);
        Route::get('form-penilaian2/{id}/{kelompok}',[Penilaian2Controller::class, 'isi_penilaian2'])->name('isiPenilaian2');
        ///
        Route::resource('penilaian-partisipasi3', Penilaian3Controller::class);
        Route::get('penilaian3/peserta/{id}',[Penilaian3Controller::class, 'semua_peserta'])->name('pesertaPenilaian3');
        Route::get('form-penilaian3/input/{id_pelatihan}/{nip}',[Penilaian3Controller::class, 'input_nilai'])->name('beriPenilaian3');
        //
        Route::resource('penilaian-pribadi4', Penilaian4Controller::class);
        Route::get('penilaian4/peserta/{id}',[Penilaian4Controller::class, 'semua_peserta'])->name('pesertaPenilaian4');
        Route::get('form-penilaian4/input/{id_pelatihan}/{nip}',[Penilaian4Controller::class, 'input_nilai'])->name('beriPenilaian4');

    });

    Route::prefix('error')->group(function(){
        Route::get('/penilaian', function(){
            return view('errors.dashboard.sudah-menilai');
        })->name('errorPenilaian');
    });

    //admin permisioon
    Route::prefix('admin')-> group(function (){
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });

    
});

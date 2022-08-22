<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TloginController;
use App\Http\Controllers\TregisterController;
use App\Http\Controllers\TmahasiswaController;
use App\Http\Controllers\TdosenController;
use App\Http\Controllers\TsekdirController;
use App\Http\Controllers\TadminController;
use App\Http\Controllers\TadmindosenController;
use App\Http\Controllers\TadminmhsController;
use App\Http\Controllers\superadmin;
use App\Http\Controllers\userController;
use App\Http\Controllers\prodiController;

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

//login
    Route::get('/', function () {
        return view('login.landingpage');
    });
    Route::get('/register', [TregisterController::class, 'index'])->name('login.register')->middleware('guest');
    Route::post('/register', [TregisterController::class, 'create']);
    Route::get('/login', [TloginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [TloginController::class, 'authenticate']);
    Route::post('/logout', [TloginController::class, 'logout'])->name('logout.register');
// login

// admin
    Route::get('/dashboardA', [TadminController::class, 'index'])->name('admin.Dadmin')->middleware('admin');
    Route::get('/exportsemua', [TadminController::class, 'exportsemua'])->name('exportsemua')->middleware('admin');
    Route::get('/vall', [TadminController::class, 'vall'])->name('vall')->middleware('admin');
    Route::get('/datasedangmengikuti', [TadminmhsController::class, 'index'])->name('admin.datamhs')->middleware('admin');
    Route::post('/data_mahasiswa', [TadminmhsController::class, 'mahasiswa'])->name('admin.datamhs')->middleware('admin');
    Route::get('/dataselesailomba', [TadminmhsController::class, 'sudah'])->name('admin.sudah')->middleware('admin');
    Route::post('/data_selesai', [TadminmhsController::class, 'sudahselesai'])->name('admin.sudahselesai')->middleware('admin');
    Route::get('/datasemua', [TadmindosenController::class, 'index'])->name('admin.datadsn')->middleware('admin');
    Route::post('/data_semua', [TadmindosenController::class, 'dosen'])->name('admin.datadsn')->middleware('admin');
// admin


// Mahasiswa
    Route::get('/dashboardM', [TmahasiswaController::class, 'beranda'])->name('mahasiswa.dashboard')->middleware('mahasiswa');
    Route::get('/form', [TmahasiswaController::class, 'index'])->name('mahasiswa.form')->middleware('mahasiswa'); 
    Route::post('/addform', [TmahasiswaController::class, 'tambahdata'])->name('mahasiswa.addform')->middleware('mahasiswa');
    Route::get('/detail', [TmahasiswaController::class, 'detaildata'])->name('mahasiswa.detail')->middleware('mahasiswa');
    Route::get('edit/{ID}', [TmahasiswaController::class, 'edit'])->name('mahasiswa.edit')->middleware('mahasiswa');
    Route::patch('update/{ID}', [TmahasiswaController::class, 'update'])->name('mahasiswa.update')->middleware('mahasiswa');
    Route::get('/uploadm', [TmahasiswaController::class, 'uploadsertifikat'])->name('mahasiswa.upload')->middleware('mahasiswa');
    Route::get('/riwayat', [TmahasiswaController::class, 'riwayat'])->name('mahasiswa.riwayat')->middleware('mahasiswa');
// Mahasiswa

// Dosen
    Route::get('/dashboardD', [TdosenController::class, 'index'])->name('dosen.dashboard')->middleware('dosen');
    Route::get('/persetujuand', [TdosenController::class, 'detail'])->name('dosen.detail')->middleware('dosen');
    Route::get('/editd/{ID}', [TdosenController::class, 'edit'])->name('dosen.edit')->middleware('dosen');
    Route::patch('/updated/{ID}', [TdosenController::class, 'updatedosen'])->name('dosen.update')->middleware('dosen');
    Route::get('/uploadd', [TdosenController::class, 'setujui'])->name('dosen.upload')->middleware('dosen');
    Route::get('/pembataland', [TdosenController::class, 'detail2'])->name('dosen.detail2')->middleware('dosen');
    Route::get('/hapus{ID}', [TdosenController::class, 'hapusdata'])->name('dosen.hapus')->middleware('dosen');
    Route::get('/file/download/{ID}', [TdosenController::class, 'download'])->name('download.proposal')->middleware('dosen');
// dosen

// Sekdir
    Route::get('/dashboardS', [TsekdirController::class, 'index'])->name('sekdir.dashboard')->middleware('sekdir');
    Route::get('/persetujuans', [TsekdirController::class, 'detail'])->name('sekdir.persetujuan')->middleware('sekdir');
    Route::get('/edits/{ID}', [TsekdirController::class, 'edit'])->name('sekdir.edit')->middleware('sekdir');
    Route::patch('updateS/{ID}', [TsekdirController::class, 'update'])->name('sekdir.update')->middleware('sekdir');
    Route::get('/uploads', [TsekdirController::class, 'upload'])->name('sekdir.upload')->middleware('sekdir');
// sekdir

// superadmin
    Route::controller(superadmin::class)->group(function () {
        Route::get('/roles', 'index')->name('role')->middleware('superadmin');
        Route::get('/roles/add', 'add')->name('add.roles')->middleware('superadmin');
        Route::post('/roles/store', 'store')->name('save.roles')->middleware('superadmin');
        Route::get('/roles/edit/{id}', 'edit')->name('edit.roles')->middleware('superadmin');
        Route::patch('/roles/update/{id}', 'update')->name('update.roles')->middleware('superadmin');
        Route::get('/hapus/roles/{id}', 'delete')->name('hapus.roles')->middleware('superadmin');
    });
    Route::controller(userController::class)->group(function () {
        Route::get('/user', 'index')->name('user')->middleware('superadmin');
        Route::get('/user/add', 'add')->name('add.user')->middleware('superadmin');
        Route::post('/user/store', 'store')->name('save.user')->middleware('superadmin');
        Route::get('/user/edit/{id}', 'edit')->name('edit.user')->middleware('superadmin');
        Route::patch('/user/update/{id}', 'update')->name('update.user')->middleware('superadmin');
        Route::get('/user/roles/{id}', 'delete')->name('hapus.user')->middleware('superadmin');
    });
    Route::controller(prodiController::class)->group(function () {
        Route::get('/prodi', 'index')->name('prodi')->middleware('superadmin');
        Route::get('/prodi/add', 'add')->name('add.prodi')->middleware('superadmin');
        Route::post('/prodi/store', 'store')->name('save.prodi')->middleware('superadmin');
        Route::get('/prodi/edit/{id}', 'edit')->name('edit.prodi')->middleware('superadmin');
        Route::patch('/prodi/update/{id}', 'update')->name('update.prodi')->middleware('superadmin');
        Route::get('/prodi/roles/{id}', 'delete')->name('hapus.prodi')->middleware('superadmin');
    });
// superadmin
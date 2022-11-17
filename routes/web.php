<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KelurahanController;

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

Route::get('/', [WebController::class, 'index'])->name('index');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//event
Route::get('/event', [ProgramController::class, 'evnlist'])->name('event');
Route::get('/adevn', [ProgramController::class, 'evnadd'])->name('adevn');
Route::post('/postevn', [ProgramController::class, 'evninsert'])->name('postevn');
Route::get('/edevn/{id}', [ProgramController::class, 'evnedit'])->name('edevn');
Route::post('/upevn/{id}', [ProgramController::class, 'evnupdate'])->name('upevn');
Route::get('/delevn/{id}', [ProgramController::class, 'evndelete'])->name('delevn');

//pelatihan
Route::get('/pelatihan', [ProgramController::class, 'pelatihanlist'])->name('pelatihan');
Route::get('/addpelatihan', [ProgramController::class, 'pelatihanadd'])->name('addpelatihan');
Route::post('/postpelatihan', [ProgramController::class, 'pelatihaninsert'])->name('postpelatihan');

//KELURAHAN
Route::get('/kelurahan', [KelurahanController::class, 'kelurahanlist'])->name('kelurahan');
Route::get('/addkelurahan', [KelurahanController::class, 'kelurahanadd'])->name('addkelurahan');
Route::post('/postkelurahan', [KelurahanController::class, 'kelurahaninsert'])->name('postkelurahan');
Route::get('/edkel/{id_kelurahan}', [KelurahanController::class, 'kelurahanedit'])->name('edkel');
Route::post('/upkel/{id_kelurahan}', [KelurahanController::class, 'kelurahanupdate'])->name('upkel');
Route::get('/delkel/{id_kelurahan}', [KelurahanController::class, 'kelurahandelete'])->name('delkel');

//PEGAWAI 
Route::get('/pegawai', [KelurahanController::class, 'pegawailist'])->name('pegawai');
Route::get('/addpegawai', [KelurahanController::class, 'pegawaiadd'])->name('addpegawai');
Route::post('/postpegawai', [KelurahanController::class, 'pegawaiinsert'])->name('postpegawai');
Route::get('/edpeg/{id_pegawai}', [KelurahanController::class, 'pegawaiedit'])->name('edpeg');
Route::post('/uppeg/{id_pegawai}', [KelurahanController::class, 'pegawaiupdate'])->name('uppeg');
Route::get('/delpeg/{id_pegawai}', [KelurahanController::class, 'pegawaidelete'])->name('delpeg');

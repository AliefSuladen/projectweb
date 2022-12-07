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

//BERITA
Route::get('/berita', [ProgramController::class, 'evnlist'])->name('berita');
Route::get('/adber', [ProgramController::class, 'evnadd'])->name('adber');
Route::post('/postevn', [ProgramController::class, 'evninsert'])->name('postevn');
Route::get('/edber/{id}', [ProgramController::class, 'evnedit'])->name('edber');
Route::post('/upber/{id}', [ProgramController::class, 'evnupdate'])->name('upber');
Route::get('/delber/{id}', [ProgramController::class, 'evndelete'])->name('delber');


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

//KATEGORI
Route::get('/kategori', [ProgramController::class, 'kategorilist'])->name('kategori');
Route::get('/addkategori', [ProgramController::class, 'kategoriadd'])->name('addkategori');
Route::post('/postkategori', [ProgramController::class, 'kategoriinsert'])->name('postkategori');
Route::get('/delkat/{id_kategori}', [ProgramController::class, 'kategoridelete'])->name('delkat');

//NOMOR PENTING
Route::get('/nope', [ProgramController::class, 'nopelist'])->name('nope');
Route::get('/addnope', [ProgramController::class, 'nopeadd'])->name('addnope');
Route::post('/postnope', [ProgramController::class, 'nopeinsert'])->name('postnope');
Route::get('/delnop/{id_kategori}', [ProgramController::class, 'nopedelete'])->name('delnop');

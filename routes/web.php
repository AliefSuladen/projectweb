<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProgramController;

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

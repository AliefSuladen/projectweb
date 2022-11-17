<?php

use App\Http\Controllers\API\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('event', [Admin::class, 'event']);
Route::get('pelatihan', [Admin::class, 'pelatihan']);
Route::get('kelurahan', [Admin::class, 'kelurahan']);
Route::get('pegawai', [Admin::class, 'pegawai']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

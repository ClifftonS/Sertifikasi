<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwalController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;

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
     return redirect('/buku');
 });
Route::get('/buku', [BukuController::class, 'get']);
Route::get('/anggota', [AnggotaController::class, 'get']);
Route::post('/addbuku', [BukuController::class, 'add']);
Route::post('/deletebuku', [BukuController::class, 'delete']);
Route::post('/editbuku', [BukuController::class, 'edit']);

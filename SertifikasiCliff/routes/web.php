<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwalController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;

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
     return redirect('/peminjaman');
 });
Route::get('/buku', [BukuController::class, 'get']);
Route::get('/peminjaman', [PeminjamanController::class, 'get']);
Route::get('/anggota', [AnggotaController::class, 'get']);
Route::post('/addpeminjaman', [PeminjamanController::class, 'add']);
Route::post('/deletepeminjaman', [PeminjamanController::class, 'delete']);
Route::post('/editpeminjaman', [PeminjamanController::class, 'edit']);
Route::post('/addanggota', [AnggotaController::class, 'add']);
Route::post('/deleteanggota', [AnggotaController::class, 'delete']);
Route::post('/editanggota', [AnggotaController::class, 'edit']);
Route::post('/addbuku', [BukuController::class, 'add']);
Route::post('/deletebuku', [BukuController::class, 'delete']);
Route::post('/editbuku', [BukuController::class, 'edit']);
Route::get('/ajaxbuku', [BukuController::class, 'ajax']);
Route::get('/ajaxagt', [AnggotaController::class, 'ajax']);
Route::get('/ajaxpmnj', [PeminjamanController::class, 'ajax']);

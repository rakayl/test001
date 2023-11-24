<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\DataMesinController;
use App\Models\KlasMesin;
use App\Models\KategoriMesin;
use App\Models\DataMesin;
use App\Models\Workshop;
use App\Http\Controllers\HistoryController;
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
/*Data Export */

Route::post('api/getklasmesin', [DataMesinController::class, 'getklasmesin']);

Route::any('/data-mesin/getDtRowData', [DataMesinController::class, 'getDtRowData']);
Route::POST('/data-mesin/delete/{id}', [DataMesinController::class, 'destroy']);
Route::POST('/data-mesin/approved', [DataMesinController::class, 'approved']);
Route::get('/data-mesin/{id}/edit', [DataMesinController::class, 'edit']);
Route::post('/data-mesin-update/{id}', [DataMesinController::class, 'update']);

Route::any('/history', [HistoryController::class, 'index']);
Route::any('/history/getDtRowData', [HistoryController::class, 'getDtRowData']);

Route::get('/get-latest-id', [DataMesinController::class, 'getLatestID']);
Route::get('/get-latest-mesin/{kategoriID}/{klasifikasiID}/{tahun}', [DataMesinController::class, 'getLatestmESIN']);
Route::get('/get-latest-mesin-by-id/{kategoriID}/{klasifikasiID}/{id}', [DataMesinController::class, 'getLatestbyId']);
Route::get('/get-latest-id/{kategoriID}/{klasifikasiID}', [DataMesinController::class, 'getLatestID']);
Route::get('/get-kategori-data', [DataMesinController::class, 'getKategoriData']);
Route::get('/get-klasifikasi-data/{kategori}', [DataMesinController::class, 'getKlasifikasiData']);


Route::get('/', [DataMesinController::class, 'index'])->middleware('auth');

Route::resource('/data-mesin', DataMesinController::class)->middleware('auth');


Route::get('/home', [App\Http\Controllers\DataMesinController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\DataMesinController::class, 'index'])->name('home');

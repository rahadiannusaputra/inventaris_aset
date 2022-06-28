<?php

use App\Http\Controllers\CetakPdf;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifikasiController;
use App\Models\inventaris;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware('auth');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');
// Route::get('/tables', [InventarisController::class, 'index'])->middleware('auth');



Route::get(
    '/forminventaris',
    function () {
        return view('forminventaris');
    }
)->middleware('auth');

Route::redirect('/', 'login');


Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('login', function () {
//     return view('login');
// });
//export excel file
Route::get('/generate-pdf', [CetakPdf::class, 'generatePdf'])->middleware('auth');
Route::get('/generate-pdf/{id}', [CetakPdf::class, 'generatePdfOne'])->middleware('auth');
Route::get('inventaris/export', [InventarisController::class, 'export'])->middleware('auth');
Route::post('inventaris/import', [InventarisController::class, 'import'])->middleware('auth');
Route::get('/verification', [VerifikasiController::class, 'verification'])->middleware('admin')->name('verifikasi.index');
Route::get('/verification/confirm/{inventaris}', [VerifikasiController::class, 'confirm'])->middleware('admin');
Route::post('/verification/decline/{inventaris}', [VerifikasiController::class, 'decline'])->middleware('admin')->name('verifikasi.decline');
Route::get('/verification/{inventaris}', [VerifikasiController::class, 'detail'])->middleware('admin')->name('verifikasi.detail');
Route::get('dashboard/inventaris', [DashboardController::class, 'data'])->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('inventaris', InventarisController::class)->middleware('auth')->parameters(['inventaris' => 'inventaris']);
Route::resource('ruangan', RuanganController::class)->middleware('admin');
Route::resource('user', UserController::class)->middleware('admin');
Route::get('resultscan/{kodeBarang}', [InventarisController::class, 'detailBarangViaScans'])->name('detaildata');

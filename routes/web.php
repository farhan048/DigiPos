<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\JenisController;
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

Route::resource('kecamatan', KecamatanController::class)->except(['create','show','update']);
Route::resource('desa', DesaController::class)->except(['create','show','update']);
Route::resource('puskesmas', PuskesmasController::class)->except(['create','show','update']);
Route::resource('posyandu', PosyanduController::class)->except(['create','show','update']);
Route::resource('jenis-imunisasi', JenisController::class)->except(['create','show','update']);

Route::get('/profile', function () {
    return view('admin.profile');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';

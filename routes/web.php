<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecamatanController;
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
Route::get('/desa', function () {
    return view('admin.desa.index');
});
Route::get('/profile', function () {
    return view('admin.profile');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

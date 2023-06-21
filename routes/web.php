<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('pages.homepage.index');
})->name('home');

Route::resource('/kriteria', KriteriaController::class);
Route::resource('/alternatif', AlternatifController::class);
Route::resource('/matriks', MatriksController::class);
Route::post('/normalisasikan', [NormalisasiController::class, 'normalisasi'])->name('normalisasikan');
Route::post('/normalisasikan-2', [NormalisasiController::class, 'normalisasi2'])->name('normalisasikan.step2');
Route::post('/normalisasikan-3', [NormalisasiController::class, 'normalisasi3'])->name('normalisasikan.step3');
Route::post('/normalisasikan-terbobot', [NormalisasiController::class, 'normalisasiTerbobot'])->name('normalisasikan.terbobot');
Route::post('/yimax', [NormalisasiController::class, 'yiMax'])->name('yimax');
Route::post('/matriks-result', [NormalisasiController::class, 'result'])->name('matriks.result');
Route::post('/result/destroy', [NormalisasiController::class, 'destroy'])->name('destroy');
Route::resource('/result', ResultController::class);

<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VentaController;
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
Route::get('/', [InfoController::class, 'index'])->name('index');
Route::get('/create', [InfoController::class, 'create'])->name('create');
Route::get('/donwload/{id}', [InfoController::class, 'donwload'])->name('donwload');
Route::post('/store', [InfoController::class, 'store'])->name('store');

Route::resource('/photos', PhotoController::class);

Route::resource('/ventas', VentaController::class);
Route::get('/ventas/donwload/{pdf}', [VentaController::class, 'donwload'])->name('pdf.donwload');
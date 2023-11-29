<?php

use App\Http\Controllers\NilaiSiswaController;
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

Route::get('/', [NilaiSiswaController::class, 'showForm']);
Route::post('/simpan-nilai', [NilaiSiswaController::class, 'simpanNilai']);

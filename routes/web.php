<?php

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

Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('index');
Route::post('/confirm', [App\Http\Controllers\ContactController::class, 'confirm'])->name('confirm');
Route::post('/send', [App\Http\Controllers\ContactController::class, 'send'])->name('send');

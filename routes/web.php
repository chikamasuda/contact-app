<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;


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
//問い合わせページ
Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/send', [ContactController::class, 'send'])->name('send');

//管理画面
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');;
Route::delete('/contacts/{contact}/destroy', [AdminController::class, 'destroy'])->name('contacts.destroy');
Route::get('/contacts/search', [AdminController::class, 'search'])->name('contacts.search');

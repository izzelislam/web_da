<?php

use App\Http\Controllers\Main\ArticleController;
use App\Http\Controllers\Main\ComentController;
use App\Http\Controllers\Main\GaleryController;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\PendaftarController;
use App\Http\Controllers\Main\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home-page');
Route::get('/articles', [ArticleController::class, 'index'])->name('main-article.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('main-article.show');
Route::get('/galeries', [GaleryController::class, 'index'])->name('main-galeries.index');
Route::get('/pendaftar', [PendaftarController::class, 'index'])->name('pendaftar.index');
Route::post('/pendaftar', [PendaftarController::class, 'check'])->name('pendaftar.check');
Route::get('/profile', [ProfileController::class, 'index'])->name('main-profile.index');
Route::get('/flayer-download/{id}', [ArticleController::class, 'flayerDownload'])->name('flayer.download');

Route::post('/coment/{id}', [ComentController::class, 'store'])->name('main-coment.store');
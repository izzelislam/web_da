<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\admin\GaleryController;
use App\Http\Controllers\admin\SchoolyearController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function(){
  return view('admin.pages.home');
});

Route::prefix('/admin')->group(function(){
  Route::resource('/article-category', ArticleCategoryController::class);
  Route::resource('/unit', UnitController::class);
  Route::resource('/school-year', SchoolyearController::class);
  Route::resource('/video', VideoController::class);
  Route::resource('/slider', SliderController::class);
  Route::resource('/users', UserController::class);

  Route::get('/galery', [GaleryController::class, 'index'])->name('galery.index');
  Route::post('/galery', [GaleryController::class, 'store'])->name('galery.store');
  Route::delete('/galery/{id}', [GaleryController::class, 'destroy'])->name('galery.delete');
});
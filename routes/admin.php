<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\admin\GaleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\admin\SchoolyearController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;
use OpenSpout\Common\Entity\Row;

Route::get('/admin', function(){
  return view('admin.pages.home');
});

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin-auth.index');
Route::post('/admin/login', [AdminAuthController::class, 'store'])->name('admin-auth.store');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin-auth.logout');

Route::prefix('/admin')->middleware(['auth:admin', 'admin'])->group(function(){
  Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

  Route::resource('/article-category', ArticleCategoryController::class);
  Route::resource('/unit', UnitController::class);
  Route::resource('/school-year', SchoolyearController::class);
  Route::resource('/video', VideoController::class);
  Route::resource('/slider', SliderController::class);
  Route::resource('/admin-user', AdminController::class);
  Route::resource('/users', UserController::class);
  Route::resource('/article', ArticleController::class);
  Route::get('/user/download-doc/{id}/{type}', [UserController::class, 'downloadDoc'])->name('download-doc');

  Route::get('/galery', [GaleryController::class, 'index'])->name('galery.index');
  Route::post('/galery', [GaleryController::class, 'store'])->name('galery.store');
  Route::delete('/galery/{id}', [GaleryController::class, 'destroy'])->name('galery.delete');

  Route::put('/confirm-payment/{id}', [PaymentController::class, 'confirmStatus'])->name('payment.confirm');
  Route::put('/cancel-payment/{id}', [PaymentController::class, 'cancelStatus'])->name('payment.cancel');
});
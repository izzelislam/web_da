<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\FlayerController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\SchoolyearController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use OpenSpout\Common\Entity\Row;

// Route::get('/admin', function(){
//   return view('admin.pages.home');
// });

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
  Route::resource('/flayer', FlayerController::class);
  Route::resource('/article', ArticleController::class);
  Route::get('/user/download-doc/{id}/{type}', [UserController::class, 'downloadDoc'])->name('download-doc');

  Route::get('/registrant/export', [UserController::class, 'userExport'])->name('user.export');

  Route::get('/account', [AccountController::class, 'index'])->name('account.index');
  Route::get('/account/{id}', [AccountController::class, 'show'])->name('account.show');
  Route::get('/account/{id}/edit', [AccountController::class, 'edit'])->name('account.edit');
  Route::put('/account/{id}', [AccountController::class, 'update'])->name('account.update');
  Route::delete('/account/{id}', [AccountController::class, 'destroy'])->name('account.delete');


  Route::get('/galery', [GaleryController::class, 'index'])->name('galery.index');
  Route::post('/galery', [GaleryController::class, 'store'])->name('galery.store');
  Route::delete('/galery/{id}', [GaleryController::class, 'destroy'])->name('galery.delete');

  Route::put('/confirm-payment/{id}', [PaymentController::class, 'confirmStatus'])->name('payment.confirm');
  Route::put('/cancel-payment/{id}', [PaymentController::class, 'cancelStatus'])->name('payment.cancel');

  Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
  Route::post('/setting', [SettingController::class, 'store'])->name('setting.store');
  Route::put('/setting', [SettingController::class, 'update'])->name('setting.update');
});
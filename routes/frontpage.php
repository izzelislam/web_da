<?php

use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\FrontPage\BiodataController;
use App\Http\Controllers\FrontPage\DashboardController;
use App\Http\Controllers\FrontPage\DocController;
use App\Http\Controllers\FrontPage\ParentController;
use App\Http\Controllers\FrontPage\PaymentController;
use App\Http\Controllers\FrontPage\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [StudentAuthController::class, 'login'])->name('login.index');
Route::post('/login', [StudentAuthController::class, 'loginProcess'])->name('login.store');
Route::get('/register', [StudentAuthController::class, 'register'])->name('register.index');
Route::post('/register', [StudentAuthController::class, 'registerProcess'])->name('register.store');
Route::post('/logout', [StudentAuthController::class, 'logout'])->name('student.logout');



Route::prefix('/student')->middleware(['auth:web', 'student'])->group(function(){
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('frontpage.dashboard');

  Route::get('/payment-alert', [PaymentController::class, 'isPaid'])->name('payment-redirect');

  Route::middleware(['ispaid'])->group(function(){
    Route::get('/biodata', [BiodataController::class, 'create'])->name('student-biodata.create');
    Route::post('/biodata', [BiodataController::class, 'store'])->name('student-biodata.store');
    Route::put('/biodata/update', [BiodataController::class, 'update'])->name('student-biodata.update');
    
    Route::get('/parent', [ParentController::class, 'create'])->name('student-parent.create');
    Route::post('/father', [ParentController::class, 'fatherStore'])->name('student-father.store');
    Route::post('/mother', [ParentController::class, 'motherStore'])->name('student-mother.store');
    Route::put('/father/update', [ParentController::class, 'fatherUpdate'])->name('student-father.update');
    Route::put('/mother/update', [ParentController::class, 'motherUpdate'])->name('student-mother.update');
    
    Route::get('/docs', [DocController::class, 'create'])->name('student-docs.create');
    Route::post('/docs', [DocController::class, 'store'])->name('student-docs.store');
    // Route::get('/docs/edit', [DocController::class, 'edit'])->name('student-docs.edit');
    // Route::put('/docs/update', [DocController::class, 'update'])->name('student-docs.update');
  
    Route::put('/payment', [PaymentController::class, 'update'])->name('payment.update');
  });
  
  Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
  Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
  
  Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('student-profile.edit');
  Route::put('/profile/update', [ProfileController::class, 'update'])->name('student-profile.update');
  Route::put('/profile/update/photo', [ProfileController::class, 'updateImageProfile'])->name('student-profile.update.photo');
  
});

<?php

use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\FrontPage\BiodataController;
use App\Http\Controllers\FrontPage\DashboardController;
use App\Http\Controllers\FrontPage\DocController;
use App\Http\Controllers\FrontPage\ParentController;
use App\Http\Controllers\FrontPage\PaymentController;
use App\Http\Controllers\FrontPage\ProfileController;
use App\Http\Controllers\FrontPage\QurbanSavingController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [StudentAuthController::class, 'login'])->name('login.index');
Route::post('/login', [StudentAuthController::class, 'loginProcess'])->name('login.store');
Route::get('/register', [StudentAuthController::class, 'register'])->name('register.index');
Route::post('/register', [StudentAuthController::class, 'registerProcess'])->name('register.store');
Route::post('/logout', [StudentAuthController::class, 'logout'])->name('student.logout');



// Route::prefix('/student')->middleware(['auth:web', 'student'])->group(function(){
//   Route::get('/dashboard', [DashboardController::class, 'index'])->name('frontpage.dashboard');

//   Route::get('/biodata', [BiodataController::class, 'create'])->name('student-biodata.create');
//   Route::post('/biodata', [BiodataController::class, 'store'])->name('student-biodata.store');
//   Route::put('/biodata/update', [BiodataController::class, 'update'])->name('student-biodata.update');
  
//   Route::get('/parent', [ParentController::class, 'create'])->name('student-parent.create');
//   Route::post('/parent', [ParentController::class, 'store'])->name('student-parent.store');
//   Route::put('/parent/update', [ParentController::class, 'update'])->name('student-parent.update');
  
//   Route::get('/docs', [DocController::class, 'create'])->name('student-docs.create');
//   Route::post('/docs', [DocController::class, 'store'])->name('student-docs.store');
//   Route::get('/docs/edit', [DocController::class, 'edit'])->name('student-docs.edit');
//   Route::put('/docs/update', [DocController::class, 'update'])->name('student-docs.update');

//   Route::middleware(['ispaid'])->group(function(){
//   });

//   Route::get('/qurban-saving', [QurbanSavingController::class, 'create'])->name('qurban-saving.create');
//   Route::post('/qurban-saving', [QurbanSavingController::class, 'store'])->name('qurban-saving.store');
//   Route::put('/qurban-update', [QurbanSavingController::class, 'update'])->name('qurban-saving.update');
  
//   Route::get('/ortu', [QurbanSavingController::class, 'create'])->name('qurban-saving.create');
//   Route::post('/ortu', [QurbanSavingController::class, 'store'])->name('qurban-saving.store');
//   Route::put('/ortu-update', [QurbanSavingController::class, 'update'])->name('qurban-saving.update');
  
//   Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
//   Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
//   Route::put('/payment', [PaymentController::class, 'update'])->name('payment.update');
//   Route::get('/payment-alert', [PaymentController::class, 'isPaid'])->name('payment-redirect');
  
//   Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('student-profile.edit');
//   Route::put('/profile/update', [ProfileController::class, 'update'])->name('student-profile.update');
//   Route::put('/profile/update/photo', [ProfileController::class, 'updateImageProfile'])->name('student-profile.update.photo');
  
// });


Route::prefix('/student')->group(function(){
  Route::get('/biodata/{ticket}', [BiodataController::class, 'create'])->name('student-biodata.create');
  Route::post('/biodata/{ticket}', [BiodataController::class, 'store'])->name('student-biodata.store');
  Route::put('/biodata/update/{ticket}', [BiodataController::class, 'update'])->name('student-biodata.update');
  
  Route::get('/parent/{ticket}', [ParentController::class, 'create'])->name('student-parent.create');
  Route::post('/parent/{ticket}', [ParentController::class, 'store'])->name('student-parent.store');
  Route::put('/parent/update/{ticket}', [ParentController::class, 'update'])->name('student-parent.update');
  
  
  Route::get('/qurban-saving/{ticket}', [QurbanSavingController::class, 'create'])->name('student-qurban-saving.create');
  Route::post('/qurban-saving/{ticket}', [QurbanSavingController::class, 'store'])->name('student-qurban-saving.store');
  Route::put('/qurban-update/{ticket}', [QurbanSavingController::class, 'update'])->name('student-qurban-saving.update');
  
  Route::get('/payment/{ticket}', [PaymentController::class, 'index'])->name('student-payment.index');
  Route::post('/payment/{ticket}', [PaymentController::class, 'store'])->name('student-payment.store');
  Route::put('/payment/{ticket}', [PaymentController::class, 'update'])->name('student-payment.update');
  Route::get('/payment-alert/{ticket}', [PaymentController::class, 'isPaid'])->name('student-payment-redirect');
  
  Route::get('/docs/{ticket}', [DocController::class, 'create'])->name('student-docs.create');
  Route::post('/docs/{ticket}', [DocController::class, 'store'])->name('student-docs.store');

  Route::get('/profile/{ticket}', [ProfileController::class, 'index'])->name('student-profile.index');
});
  // Route::get('/ortu', [QurbanSavingController::class, 'create'])->name('qurban-saving.create');
  // Route::post('/ortu', [QurbanSavingController::class, 'store'])->name('qurban-saving.store');
  // Route::put('/ortu-update', [QurbanSavingController::class, 'update'])->name('qurban-saving.update');
  
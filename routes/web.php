<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentication;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\themesController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index']);
Route::get('/theme/{id}/details',[HomeController::class,"themedetails"]);
Route::view('/login', 'log-in');
Route::view('/register', 'register');
Route::view('/splashes', 'splashes2cb8');
Route::get('/upload',[HomeController::class,"uploads"])->Middleware("profile");
Route::view('/faq', 'faq');
Route::view('/contact', 'contact');
Route::get('/profile', [HomeController::class,"profile"])->Middleware("profile");
Route::view('/terms', 'terms');
Route::get('/account',[HomeController::class,"account"])->Middleware("profile");
Route::post('/contact',[HomeController::class,'contact']);
Route::post('/loginSubmit',[authentication::class,'login']);
Route::post('/registerSubmit',[authentication::class,'register']);
Route::get('/logout',[authentication::class,'logout']);
Route::fallback(function () {
    return response()->view('notFound', [], 404);
});
Route::post('/SubmitThemes',[themesController::class,'store']);
Route::post('/changepassword',[authentication::class,'changepassword']);

Route::post("/createcategory",[themesController::class,"createcategory"]);
Route::get("/category/{id}/delete",[themesController::class,"deletecategory"]);

// admin routes
Route::get('/admin',[adminController::class,"admin"])->Middleware("admin");
Route::get('/admin/allusers',[adminController::class,'allusers'])->middleware('admin');
Route::get('/admin/allthemes',[adminController::class,'allthemes'])->middleware('admin');
Route::get('/admin/allcategory',[adminController::class,'allcategory'])->middleware('admin');
Route::get('/admin/allcontact',[adminController::class,'allcontact'])->middleware('admin');
Route::get('/userDelete/{id}',[adminController::class,'userdelete'])->middleware('admin');


// Email Verification Routes
// Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


// password reset routes

Route::get('forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentication;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\themesController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes(['verify' => true]);
Route::get('/',[HomeController::class,"index"]);
Route::get('/themedetails/{id}',[HomeController::class,"themedetails"]);
Route::view('/login', 'log-in');
Route::view('/register', 'register');
Route::view('/splashes', 'splashes2cb8');
Route::view('/upload', 'upload');
Route::view('/faq', 'faq');
Route::view('/contact', 'contact');
Route::view('/profile', 'profile')->Middleware("profile");
Route::view('/terms', 'terms');
Route::view('/terms', 'terms');
Route::view('/account', 'account');
Route::view('/reset-password', 'reset-password');
Route::post('/loginSubmit',[authentication::class,'login']);
Route::post('/registerSubmit',[authentication::class,'register']);
Route::get('/logout',[authentication::class,'logout']);
Route::fallback(function () {
    return response()->view('notFound', [], 404);
});
Route::post('/SubmitThemes',[themesController::class,'store']);

// Email Verification Routes
// Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
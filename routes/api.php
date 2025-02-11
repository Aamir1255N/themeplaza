<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\themesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/themes/download/{file}', [themesController::class, 'download'])->name('themes.download');
Route::post('/theme/download/{id}', [themesController::class, 'incrementDownload'])->name('theme.download');
// Route::post('/theme/like/{id}', [themesController::class, 'toggleLike'])->name('theme.like');
Route::post('/theme/vote/{id}', [ThemesController::class, 'handleVote'])->name('theme.vote');
Route::get('/category', [HomeController::class, 'getcategory']);
<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminPage', [AdminController::class, 'show'])->name('admin.page.show');
    Route::get('/editMoviePage/{id}',[AdminController::class,'editMovie'])->name('admin.page.edit');
    Route::put('/editMoviePage/{id}',[AdminController::class,'updateMovie'])->name('admin.page.update');
    Route::post('/adminPage', [AdminController::class, 'addMovie'])->name('admin.page.post');
    Route::delete('/adminPage/{id}', [AdminController::class, 'removeMovie'])->name('admin.page');
});

<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Example in web.php or routes/web.php

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminPage', [AdminController::class, 'show'])->name('admin.page');
    Route::post('/adminPage', [AdminController::class, 'addMovie'])->name('admin.page');
    Route::delete('/adminPage/{id}', [AdminController::class, 'removeMovie'])->name('admin.page');
    // Add other admin-only routes here
});

<?php

use App\Enums\UserTypeEnum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'type:'. UserTypeEnum::admin->value])->name('dashboard');

Route::middleware(['auth', 'type:'. UserTypeEnum::admin->value])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('admins', AdminController::class)->except(['show'])->middleware('role:super-admin');
    Route::resource('products', ProductController::class)->except(['show']);
});

require __DIR__.'/auth.php';

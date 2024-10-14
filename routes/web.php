<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProcess'])->name('login.process');
});

Route::name('user.')->middleware(['auth', 'auth.session'])->group(function () {
    Route::get('dashboard', [ContentController::class, 'dashboard'])->name('dashboard');
    Route::get('monthly-payment', [ContentController::class, 'payment'])->name('monthly-payment');
    Route::get('student-achievement', [ContentController::class, 'achievement'])->name('student-achievement');
    Route::get('student-misconduct', [ContentController::class, 'misconduct'])->name('student-misconduct');

    Route::prefix("profile/")->group(function () {
        Route::get("{id}/edit", [AccountController::class, "profile"])->name("profile");
        Route::put("{id}/update", [AccountController::class, "updateProfile"])->name("profile.update-image");
        Route::patch("{id}/update", [AccountController::class, "updateAccount"])->name("profile.update-account");
        Route::delete("{id}/delete", [AccountController::class, "deleteAccount"])->name("profile.delete");
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

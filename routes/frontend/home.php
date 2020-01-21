<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Spp\JournalSppController;
use App\Http\Controllers\Frontend\Spp\ReportSppController;
use App\Http\Controllers\Frontend\Spp\StoreSppController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\CalculateController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

// SPP Calculator
Route::post('calculate', [CalculateController::class, 'calculate'])->name('calculate');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

        // SPP Store
        Route::get('spp/create', [StoreSppController::class, 'index'])->name('spp.create');
        Route::post('spp/store', [StoreSppController::class, 'store'])->name('spp.store');

        // SPP Journal
        Route::get('spp/journal', [JournalSppController::class, 'index'])->name('spp.journal');

        // SPP Report
        Route::get('spp/report', [ReportSppController::class, 'index'])->name('spp.report');
    });
});

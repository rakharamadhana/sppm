<?php

use App\Http\Controllers\Backend\Spp\JournalSppController;
use App\Http\Controllers\Backend\Spp\ReportSppController;

Route::group([
    'prefix' => 'spp',
    'as' => 'spp.',
    'namespace' => 'Spp',
    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {
    // Spp
    Route::group(['namespace' => 'Spp'], function () {
        // Spp Journal
        Route::get('journal', [JournalSppController::class, 'index'])->name('journal');
        Route::post('journal', [JournalSppController::class, 'filter'])->name('journal.filter');

        // Spp Update Status
        Route::get('{id}/pending', [JournalSppController::class, 'pending'])->name('pending');
        Route::get('{id}/accept', [JournalSppController::class, 'accept'])->name('accept');
        Route::get('{id}/reject', [JournalSppController::class, 'reject'])->name('reject');

        // Spp Report
        Route::get('report', [ReportSppController::class, 'index'])->name('report');
        Route::post('report', [ReportSppController::class, 'filter'])->name('report.filter');
    });
});

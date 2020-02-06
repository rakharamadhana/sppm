<?php

use App\Http\Controllers\Backend\Options\GroupController;
use App\Http\Controllers\Backend\Options\MonthController;
use App\Http\Controllers\Backend\Options\YearController;

Route::group([
    'prefix' => 'options',
    'as' => 'options.',
    'namespace' => 'Options',
    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {
    // Option
    Route::group(['namespace' => 'Option'], function () {
        // Group
        Route::get('group', [GroupController::class, 'index'])->name('group');
        //Route::post('group', [GroupController::class, 'filter'])->name('group.filter');

        // Year
        Route::get('year', [YearController::class, 'index'])->name('year');
        //Route::post('year', [YearController::class, 'filter'])->name('year.filter');

        // Month
        Route::get('month', [MonthController::class, 'index'])->name('month');
        //Route::post('month', [MonthController::class, 'filter'])->name('month.filter');
    });
});

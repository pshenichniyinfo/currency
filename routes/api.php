<?php

use Illuminate\Support\Facades\Route;

Route::prefix('currencies')->controller(\App\Http\Controllers\Api\CurrencyController::class)->group(function () {
    Route::get('rates/{currency}', 'currencyRates');
    Route::get('average-rates', 'averageRates');
});

Route::prefix('branch')->controller(\App\Http\Controllers\Api\BranchController::class)->group(function () {
    Route::get('nearest', 'nearest');
});

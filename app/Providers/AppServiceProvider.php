<?php

namespace App\Providers;

use App\Models\Services\BanksInterface;
use App\Models\Services\CurrencyInterface;
use App\Models\Services\FinanceBanksApi;
use App\Models\Services\MinfinCurrencyApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CurrencyInterface::class, MinfinCurrencyApiService::class);
        $this->app->bind(BanksInterface::class, FinanceBanksApi::class);
    }

    public function boot(): void
    {
    }
}

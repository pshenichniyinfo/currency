<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Services\CurrencyService;
use Illuminate\Database\Seeder;

class RatesSeeder extends Seeder
{
    public function __construct(protected CurrencyService $currencyService)
    {
    }

    public function run(): void
    {
        $currencies = Currency::get();

        $this->currencyService->saveRates($currencies->pluck('slug', 'id')->toArray());
    }
}

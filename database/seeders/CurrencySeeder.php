<?php

namespace Database\Seeders;

use App\Models\Services\CurrencyService;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function __construct(protected CurrencyService $currencyService)
    {
    }

    public function run(): void
    {
        $this->currencyService->fetchAndSeed();
    }
}

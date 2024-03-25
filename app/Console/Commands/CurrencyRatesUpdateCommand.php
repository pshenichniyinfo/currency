<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Models\Services\CurrencyService;
use Illuminate\Console\Command;

class CurrencyRatesUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:currency-rates-update-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $currencyService = app(CurrencyService::class);
        $currencies = Currency::get();

        $currencyService->saveRates($currencies->pluck('slug', 'id')->toArray());
    }
}

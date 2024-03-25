<?php

namespace App\Models\Services;

use App\Data\CurrencyApiData;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\CurrencyRate;

class CurrencyService
{
    public function __construct(protected CurrencyInterface $currencyApi)
    {
    }

    public function createCurrency(CurrencyApiData $currencyData)
    {
        return Currency::create($currencyData->toArray());
    }

    public function fetchAndSeed(): void
    {
        $currencies = $this->currencyApi->fetchCurrencies();

        $selectedCurrencies = array_filter($currencies, function ($currency) {
            return in_array($currency["code"], config('api.current_currencies'));
        });

        foreach ($selectedCurrencies as $currency) {
            $this->createCurrency(CurrencyApiData::from($currency));
        }
    }

    public function saveRates(array $slugCurrencies)
    {
        foreach ($slugCurrencies as $key => $slugCurrency) {
            $rates = $this->currencyApi->fetchCurrentRates($slugCurrency);

            foreach ($rates as $rate) {
                $bank = Bank::where('slug', $rate['slug'])->first();

                if ($bank) {
                    CurrencyRate::updateOrCreate(
                        [
                            'currency_id' => $key,
                            'bank_id' => $bank->id,
                        ],
                        [
                            'cash_rate' => $rate['cash']['ask'],
                            'card_rate' => $rate['card']['ask'] ?? null,
                        ]
                    );
                }
            }
        }

    }
}

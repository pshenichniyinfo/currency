<?php

namespace App\Models\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

readonly class MinfinCurrencyApiService implements CurrencyInterface
{
    public function fetchCurrencies(): array|null
    {
        $response = Http::get(config('api.currency_url'));

        try {
            $responseJson = $response->json();

            return $responseJson['list'];
        } catch (\Exception $exception) {
            Log::critical('message', ['message' => $exception->getMessage()]);

            return null;
        }
    }

    public function fetchCurrentRates(string $currencyCode)
    {
        $response = Http::get(str_replace('{currency_code}', $currencyCode, config('api.currency_rates_url')));

        try {
            $responseJson = $response->json();

            return $responseJson['data'];
        } catch (\Exception $exception) {
            Log::critical('message', ['message' => $exception->getMessage()]);

            return null;
        }
    }
}

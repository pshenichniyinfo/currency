<?php

namespace App\Models\Services;

interface CurrencyInterface
{
    public function fetchCurrencies();
    public function fetchCurrentRates(string $currencyCode);
}

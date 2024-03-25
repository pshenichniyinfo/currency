<?php

return [
    'currency_url' =>  env('CURRENCY_API_URL'),
    'currency_rates_url' =>  env('CURRENCY_RATES_API_URL'),
    'current_currencies' =>  ["USD", "EUR", "GBP", "CHF", "PLN"],
    'current_banks' =>  ["privatbank", "ukreximbank", "ukrgasbank", "pumb", "ukrsibbank"],
    'bank' => [
        'list_url' =>  env('BANKS_API_URL'),
        'branch_url' =>  env('BRANCH_API_URL'),
    ],
];

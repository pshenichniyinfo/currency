<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyRateResource;
use App\Http\Resources\CurrencyResource;
use App\Models\Branch;
use App\Models\Currency;
use App\Models\CurrencyRate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function currencyRates($currencyName): JsonResponse
    {
        $currency = Currency::where('slug', $currencyName)->first();

        if (!$currency) {
            return response()->json(['message' => 'currency not found'], 404);
        }

        $currencyRates = $currency->currencyRates()->with('bank')->get();

        return response()->json([
            'currency' => new CurrencyResource($currency),
            'rates' => CurrencyRateResource::collection($currencyRates),
        ]);
    }

    public function averageRates()
    {
        $averageRates = Currency::with(['currencyRates' => function ($query) {
            $query->selectRaw('currency_id, AVG(cash_rate) as cash_rate, AVG(card_rate) as card_rate')
                ->groupBy('currency_id');
        }])
            ->get();


        return CurrencyResource::collection($averageRates);
    }
}

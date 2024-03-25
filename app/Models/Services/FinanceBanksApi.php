<?php

namespace App\Models\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FinanceBanksApi implements BanksInterface
{
    public function fetchBanks(): array|null
    {
        $response = Http::get(config('api.bank.list_url'));

        try {
            $responseJson = $response->json();

            return $responseJson['responseData'];
        } catch (\Exception $exception) {
            Log::critical('message', ['message' => $exception->getMessage()]);

            return null;
        }
    }

    public function fetchBranches(string $slug): array|null
    {
        $response = Http::get(str_replace('{slug}', $slug, config('api.bank.branch_url')));

        try {
            $responseJson = $response->json();

            return $responseJson['data'];
        } catch (\Exception $exception) {
            Log::critical('message', ['message' => $exception->getMessage()]);

            return null;
        }
    }
}

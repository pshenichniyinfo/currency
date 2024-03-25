<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyRateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'cash_rate' => $this->cash_rate,
            'card_rate' => $this->card_rate,
            'bank' => new BankResource($this->whenLoaded('bank')),
        ];
    }
}

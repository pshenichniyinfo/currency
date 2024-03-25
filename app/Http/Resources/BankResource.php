<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'squareLogo' => $this->squareLogo,
            'phone' => $this->phone,
            'site' => $this->site,
            'ratingBank' => $this->ratingBank,
        ];
    }
}

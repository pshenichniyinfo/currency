<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CurrencyApiData extends Data
{
    public function __construct(
      public string $code,
      public string $name,
      public string $slug,
      public ?int $symbol,
    ) {}
}

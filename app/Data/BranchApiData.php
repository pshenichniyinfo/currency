<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class BranchApiData extends Data
{
    public function __construct(
      public int $bank_id,
      public string $name,
      public string $address,
      public string $lat,
      public string $lng,
    ) {}
}

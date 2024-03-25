<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class BankApiData extends Data
{
    public function __construct(
      public string $title,
      public string $slug,
      public string $squareLogo,
      public string $legalAddress,
      public string $phone,
      public string $site,
      public string $ratingBank,
    ) {}
}

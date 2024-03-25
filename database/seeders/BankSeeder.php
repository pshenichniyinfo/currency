<?php

namespace Database\Seeders;

use App\Models\Services\BankService;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    public function __construct(protected BankService $bankService)
    {
    }

    public function run(): void
    {
        $this->bankService->fetchAndSeed();
    }
}

<?php

namespace App\Models\Services;

interface BanksInterface
{
    public function fetchBanks();
    public function fetchBranches(string $slug);
}

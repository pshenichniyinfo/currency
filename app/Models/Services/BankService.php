<?php

namespace App\Models\Services;

use App\Data\BankApiData;
use App\Data\BranchApiData;
use App\Models\Bank;
use App\Models\Branch;

class BankService
{
    public function __construct(protected BanksInterface $bank)
    {
    }

    public function createCurrency(BankApiData $bank): Bank
    {
        return Bank::create($bank->toArray());
    }

    public function createBranch(BranchApiData $branch): Branch
    {
        return Branch::create($branch->toArray());
    }

    public function fetchAndSeed(): void
    {
        $banks = $this->bank->fetchBanks();

        $selectedBanks = array_filter($banks, function ($bank) {
            return in_array($bank["slug"], config('api.current_banks'));
        });

        foreach ($selectedBanks as $bank) {
            $createBank = $this->createCurrency(BankApiData::from([
                'title' => $bank['title'],
                'slug' => $bank['slug'],
                'squareLogo' => $bank['squareLogo'][0],
                'legalAddress' => $bank['legalAddress'],
                'phone' => $bank['phone'],
                'site' => $bank['site'],
                'ratingBank' => $bank['ratingBank'],
            ]));


            $branches = $this->bank->fetchBranches($bank['slug']);

            foreach ($branches as $branch) {
                foreach ($branch['data'] as $datum) {
                    $branchData = BranchApiData::from([
                        'bank_id' => $createBank->id,
                        'name' => $datum['branch_name'],
                        'address' => $datum['address'],
                        'lat' => $datum['lat'],
                        'lng' => $datum['lng'],
                    ]);

                    $this->createBranch($branchData);
                }
            }
        }
    }
}

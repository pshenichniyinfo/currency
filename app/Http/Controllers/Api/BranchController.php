<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NearestBranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function nearest(NearestBranchRequest $branchRequest)
    {
        $fields = $branchRequest->validated();

        $branches = Branch::selectRaw('*,
            (6371 * acos(cos(radians(' . $fields["latitude"] . '))
            * cos(radians(lat))
            * cos(radians(lng) - radians(' . $fields["longitude"] . '))
            + sin(radians(' . $fields["latitude"] . '))
            * sin(radians(lat)))) AS distance')
            ->having('distance', '<=', $fields["max_distance"])
            ->orderBy('distance')
            ->get();

        return response()->json([
            'nearest_branch' => $branches,
        ]);
    }
}

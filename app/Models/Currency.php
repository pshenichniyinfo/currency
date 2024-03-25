<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'slug', 'symbol'];

    public function currencyRates()
    {
        return $this->hasMany(CurrencyRate::class);
    }
}

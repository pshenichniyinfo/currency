<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    use HasFactory;

    protected $fillable = ['current_id', 'bank_id', 'cash_rate', 'card_rate'];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}

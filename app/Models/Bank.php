<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'squareLogo', 'legalAddress', 'phone', 'site', 'ratingBank'];
}

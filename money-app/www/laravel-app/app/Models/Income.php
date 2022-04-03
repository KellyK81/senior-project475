<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'user_income';

    protected $fillable = [
        'user_id',
        'income_source',
        'monthly_income',
    ];
}

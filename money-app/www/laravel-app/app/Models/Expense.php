<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $table = 'user_expense';

    protected $fillable = [
        'user_id',
        'expense_type',
        'monthly_expense_amount',
    ];
}

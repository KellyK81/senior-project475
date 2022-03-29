<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profile';

    protected $fillable = [
        'user_id',
        'job_title',
        'job_skills',
        'city',
        'state',
        'country',
        'zipcode',
        'job_location_preference',
        'years_of_experience',
        'expected_retirement_age',
        'expected_retirement_income',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'company',
        'website',
        'employment_type', // Full time|Part time|Internship|Contract
        'salary',
        'mode', // Remote|Hybrid|In-office
        'experience', // 0-1|1-3|3-5|5-10|10+ years
        'location',
        'url',
        'email',
        'employer_id'
    ];
}

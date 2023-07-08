<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'available_date',
        'available_in', // if more than one then separated by ,
        'looking_for', // Full time|Part time|Internship|Contract
        'preferred_position', // if more than one then separated by ,
        'interested_role', //Junior|Senior|Entry-Level|etc
        'mode', // Remote|Hybrid|In-office
        'url',
        'profile', // About developer
        'user_id'
    ];
}

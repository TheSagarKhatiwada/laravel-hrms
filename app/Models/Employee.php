<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasNepaliDates;

class Employee extends Model
{
    use HasNepaliDates;

    protected $fillable = [
        'employee_code',
        'first_name',
        'last_name',
        'email',
        'phone',
        'department',
        'designation',
        'date_of_joining',
        'nepali_date_of_joining',
        'dob',
        'nepali_dob',
        'address',
        'status',
    ];
}

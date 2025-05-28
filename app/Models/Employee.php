<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_code',
        'first_name',
        'last_name',
        'email',
        'phone',
        'department',
        'designation',
        'date_of_joining',
        'dob',
        'address',
        'status',
    ];
}

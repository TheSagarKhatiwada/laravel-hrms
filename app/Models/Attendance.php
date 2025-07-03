<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasNepaliDates;

class Attendance extends Model
{
    use HasNepaliDates;

    protected $fillable = [
        'employee_id',
        'date',
        'nepali_date',
        'check_in',
        'check_out',
        'status',
        'remarks',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

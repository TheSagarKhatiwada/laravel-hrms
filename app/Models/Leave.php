<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasNepaliDates;

class Leave extends Model
{
    use HasNepaliDates;

    protected $fillable = [
        'employee_id',
        'leave_type',
        'start_date',
        'end_date',
        'nepali_start_date',
        'nepali_end_date',
        'total_days',
        'status',
        'reason',
        'approved_by',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

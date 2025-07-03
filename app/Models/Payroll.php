<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasNepaliDates;

class Payroll extends Model
{
    use HasNepaliDates;

    protected $fillable = [
        'employee_id',
        'basic_salary',
        'allowances',
        'deductions',
        'net_salary',
        'pay_date',
        'nepali_pay_date',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

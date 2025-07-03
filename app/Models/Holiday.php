<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasNepaliDates;

class Holiday extends Model
{
    use HasNepaliDates;

    protected $fillable = [
        'name',
        'date',
        'type',
        'nepali_date',
        'description',
    ];
}

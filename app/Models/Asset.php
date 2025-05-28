<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'asset_code',
        'name',
        'type',
        'assigned_to',
        'assigned_date',
        'return_date',
        'status',
        'description',
    ];
}

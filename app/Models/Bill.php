<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'check_number',
        'order_id',
        'amount',
    ];

    public $timestamps = false;
}

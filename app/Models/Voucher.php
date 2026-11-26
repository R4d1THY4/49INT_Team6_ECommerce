<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'voucher_name',
        'voucher_code',
        'voucher_value',
        'voucher_type',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'cc',
        'cc_date',
        'cc_cvv',
        'user_id',
    ];

    protected $casts = [
        'cc' => 'encrypted',
        'cc_date' => 'encrypted',
        'cc_cvv' => 'encrypted',
    ];
}

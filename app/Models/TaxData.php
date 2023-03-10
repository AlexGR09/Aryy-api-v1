<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxData extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tax_data';

    protected $fillable = [
        'rfc',
        'taxpayer_name',
        'tax_regime',
        'email',
        'tax_residence',
        'constancy',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function physician()
    {
        return $this->belongsTo(Physician::class);
    }
}

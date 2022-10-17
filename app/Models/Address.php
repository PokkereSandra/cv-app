<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country',
        'region',
        'city',
        'parish',
        'village',
        'house_name',
        'street',
        'street_number',
        'flat_number',
        'postcode',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

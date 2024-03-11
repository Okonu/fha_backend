<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_type',
        'user_id',
        'external_ref',
        'channel_code',
        'amount',
        'status',
    ];

    public function user()
    {
        return $this->morphTo();
    }
}

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
        'amount',
        'status',
    ];

    public function user()
    {
        return $this->morphTo();
    }

    public function getUserTypeNameAttribute()
    {
        if($this->user_type === 'founder') {
            return $this->user->name;
        } elseif ($this->user_type === 'investor') {
            return $this->user->name;
        } elseif ($this->user_type === 'professional') {
            return $this->user->name;
        }

        return 'unknown';
    }
}

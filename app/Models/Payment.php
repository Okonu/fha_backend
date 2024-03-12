<?php

namespace App\Models;

use App\Models\Registration\Founder;
use App\Models\Registration\Investor;
use App\Models\Registration\Professional;
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

    public function founder()
    {
        return $this->belongsTo(Founder::class, 'user_id')->where('user_type', Founder::class);
    }

    public function investor()
    {
        return $this->belongsTo(Investor::class, 'user_id')->where('user_type', Investor::class);
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class, 'user_id')->where('user_type', Professional::class);
    }
}

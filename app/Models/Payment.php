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
    // public function getUserTypeNameAttribute()
    // {
    //     switch ($this->user_type) {
    //         case Founder::class:
    //             $user = Founder::find($this->user_id);
    //             return $user ? $user->name : 'Unknown';
    //         case Investor::class:
    //             $user = Investor::find($this->user_id);
    //             return $user ? $user->name : 'Unknown';
    //         case Professional::class:
    //             $user = Professional::find($this->user_id);
    //             return $user ? $user->name : 'Unknown';
    //         default:
    //             return 'Unknown';
    //     }
    // }

}

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
        'request_reference',
        'amount',
        'result_code',
        'transaction_code',
        'result_desc',
        'third_party_reference', 
        'channel_code',
        'charges_total',
    ];

    public function user()
    {
        return $this->morphTo();
    }

    public function getUserTypeNameAttribute()
    {
    //    $userType = ucfirst($this->user_type);

       $userModelClass = "App\\Models\\Registration\\" . ucfirst($this->user_type);

       if (!class_exists($userModelClass)) {
        return 'N/A';
       }

       $user = $userModelClass::find($this->user_id);

       return $user ? $user->name : 'N/A';
    }

}

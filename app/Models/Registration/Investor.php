<?php

namespace App\Models\Registration;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Investor extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'otp'];

    public function investorDetail()
    {
        return $this->hasOne(InvestorDetail::class);
    }

    public function payment()
    {
        return $this->morphMany(Payment::class, 'user');
    }

}

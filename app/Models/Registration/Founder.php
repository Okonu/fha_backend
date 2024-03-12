<?php

namespace App\Models\Registration;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Founder extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'otp'];

    public function detail()
    {
        return $this->hasOne(FounderDetail::class);
    }

    public function payment()
    {
        return $this->morphOne(Payment::class, 'user');
    }
}

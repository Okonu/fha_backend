<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Founder extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    protected $fillable = ['name', 'email', 'otp', 'identifier'];

    public function detail()
    {
        return $this->hasOne(FounderDetail::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'user');
    }
}

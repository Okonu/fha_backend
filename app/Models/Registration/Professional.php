<?php

namespace App\Models\Registration;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'otp', 'phone_number'];

    public function professionalDetail()
    {
        return $this->hasOne(ProfessionalDetail::class);
    }

    public function payment()
    {
        return $this->morphOne(Payment::class, 'user');
    }
}

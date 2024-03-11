<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function professionalDetail()
    {
        return $this->hasOne(ProfessionalDetail::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'user');
    }
}

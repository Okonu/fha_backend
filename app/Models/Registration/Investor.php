<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Investor extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function investorDetail()
    {
        return $this->hasOne(InvestorDetail::class);
    }
}

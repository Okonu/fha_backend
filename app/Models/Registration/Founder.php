<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function detail()
    {
        return $this->hasOne(FounderDetail::class);
    }
}

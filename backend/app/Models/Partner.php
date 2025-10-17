<?php

namespace App\Models;

use App\Models\Reward;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    /** @use HasFactory<\Database\Factories\PartnerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
    ];

    public function rewards()
    {
        return $this->hasMany(Reward::class, 'partnerID');
    }
}

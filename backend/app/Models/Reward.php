<?php

namespace App\Models;

use App\Models\Partner;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reward extends Model
{
    /** @use HasFactory<\Database\Factories\RewardFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'discount',
        'expiryDate',
        'partnerID',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partnerID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'rewardID');
    }
}

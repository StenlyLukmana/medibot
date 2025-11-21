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
        'expiry_date',
        'partner_id',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'reward_id');
    }
}

<?php

namespace App\Models;

use App\Models\HealthFacility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthFacilityType extends Model
{
    /** @use HasFactory<\Database\Factories\HealthFacilityTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function healthFacilities()
    {
        return $this->hasMany(HealthFacility::class, 'healthFacilityTypeID');
    }
}

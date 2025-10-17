<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\HealthFacilityType;
use Illuminate\Database\Eloquent\Model;
use App\Models\HealthFacilityDepartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthFacility extends Model
{
    /** @use HasFactory<\Database\Factories\HealthFacilityFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'contactNumber',
        'healthFacilityTypeID',
    ];

    public function type()
    {
        return $this->belongsTo(HealthFacilityType::class, 'healthFacilityTypeID');
    }

    public function facilityDepartments()
    {
        return $this->hasMany(HealthFacilityDepartment::class, 'healthFacilityID');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'healthFacilityID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'healthFacilityID');
    }
}

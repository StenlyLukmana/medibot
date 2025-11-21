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
        'contact_number',
        'health_facility_type_id',
    ];

    public function type()
    {
        return $this->belongsTo(HealthFacilityType::class, 'health_facility_type_id');
    }

    public function facilityDepartments()
    {
        return $this->hasMany(HealthFacilityDepartment::class, 'health_facility_id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'health_facility_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'health_facility_id');
    }
}

<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Appointment;
use App\Models\HealthFacility;
use Illuminate\Database\Eloquent\Model;
use App\Models\HealthFacilityDepartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'contact',
        'availableFrom',
        'availableUntil',
        'healthFacilityDepartmentID',
    ];

    public function healthFacilityDepartments()
    {
        return $this->belongsTo(HealthFacilityDepartment::class, 'healthFacilityDepartmentID');
    }

    public function department()
    {
        return $this->healthFacilityDepartments?->department();
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctorID');
    }
}

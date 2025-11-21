<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthFacilityDepartment extends Model
{
    /** @use HasFactory<\Database\Factories\HealthFacilityDepartmentFactory> */
    use HasFactory;

    protected $fillable = [
        'health_facility_id',
        'department_id',
    ];

    public function healthFacility()
    {
        return $this->belongsTo(HealthFacility::class, 'health_facility_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'health_facility_department_id');
    }
}

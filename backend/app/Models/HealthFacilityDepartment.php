<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthFacilityDepartment extends Model
{
    /** @use HasFactory<\Database\Factories\HealthFacilityDepartmentFactory> */
    use HasFactory;

    protected $fillable = [
        'healthFacilityID',
        'departmentID',
    ];

    public function healthFacility()
    {
        return $this->belongsTo(HealthFacility::class, 'healthFacilityID');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'departmentID');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'healthFacilityDepartmentID');
    }
}

<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\HealthFacility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function facilityDepartments() {
        return $this->hasMany(HealthFacilityDepartment::class, 'departmentID');
    }

}

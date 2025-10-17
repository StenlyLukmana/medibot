<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Reward;
use App\Models\HealthFacility;
use App\Models\AppointmentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
            'dateTime',
            'reason',
            'userID',
            'doctorID',
            'appointmentStatusID',
            'rewardID',
            'healthFacilityID',
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorID');
    }

    public function status()
    {
        return $this->belongsTo(AppointmentStatus::class, 'appointmentStatusID');
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class, 'rewardID');
    }

    public function healthFacility()
    {
        return $this->belongsTo(HealthFacility::class, 'healthFacilityID');
    }

    public function appointmentStatus()
    {
        return $this->belongsTo(AppointmentStatus::class, 'appointmentStatusID');
    }
}

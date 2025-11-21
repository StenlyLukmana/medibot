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
            'date',
            'start_time',
            'end_time',
            'reason',
            'user_id',
            'doctor_id',
            'appointment_status_id',
            'reward_id',
            'health_facility_id',
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function status()
    {
        return $this->belongsTo(AppointmentStatus::class, 'appointment_status_id');
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class, 'reward_id');
    }

    public function healthFacility()
    {
        return $this->belongsTo(HealthFacility::class, 'health_facility_id');
    }

    public function appointmentStatus()
    {
        return $this->belongsTo(AppointmentStatus::class, 'appointment_status_id');
    }
}

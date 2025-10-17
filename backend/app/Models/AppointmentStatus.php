<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentStatus extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentStatusFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'appointmentStatusID');
    }
}

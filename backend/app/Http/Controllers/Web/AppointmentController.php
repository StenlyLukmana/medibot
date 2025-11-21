<?php

namespace App\Http\Controllers\Web;

use App\Models\Doctor;
use App\Models\Reward;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\HealthFacility;
use App\Models\AppointmentStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\HealthFacilityDepartment;
use App\Mail\AppointmentConfirmationMail;

class AppointmentController extends Controller
{
    
    public function index()
    {
        $user = auth()->user();

        $appointments = Appointment::with(['doctor', 'healthFacility', 'appointmentStatus'])->where('user_id', $user->id)->orderBy('date', 'desc')->orderBy('start_time', 'desc')->get();

        return view('appointments.index', [
            'title' => 'My Appointments',
            'user' => $user,
            'appointments' => $appointments,
        ]);
    }

    public function createWithFacility($facility_id)
    {
        $user = auth()->user();

        $facility = HealthFacility::with('type')->findOrFail($facility_id);

        $departments = HealthFacilityDepartment::with('department')->where('health_facility_id', $facility_id)->get();
        
        $selectedDepartment = request('department_id');

        $doctorsQuery = Doctor::whereHas('healthFacilityDepartments', function ($query) use ($facility_id, $selectedDepartment) {
            $query->where('health_facility_id', $facility_id);
            if ($selectedDepartment) {
                $query->where('department_id', $selectedDepartment);
            }
        });

        $doctors = $doctorsQuery->get();
        $rewards = Reward::whereDate('expiry_date', '>=', now())->get();

        return view('appointments.create', [
            'title' => 'Book Appointment',
            'user' => $user,
            'facility' => $facility,
            'departments' => $departments,
            'doctors' => $doctors,
            'rewards' => $rewards,
            'selectedDepartment' => $selectedDepartment,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctorID' => 'required|exists:doctors,id',
            'healthFacilityID' => 'required|exists:health_facilities,id',
            'date' => 'required|date|after:today',
            'timeSlot' => 'required|string',
            'rewardID' => 'nullable|exists:rewards,id',
            'reason' => 'nullable|string|max:400',
        ]);

        [$start, $end] = explode('-', $request->timeSlot);

        $appointment = Appointment::create([
            'date' => $request->date,
            'start_time' => $start,
            'end_time' => $end,
            'reason' => $request->reason,

            'user_id' => Auth::id(),
            'doctor_id' => $request->doctorID,
            'appointment_status_id' => AppointmentStatus::where('name', 'Pending')->value('id'),
            'reward_id' => $request->rewardID,
            'health_facility_id' => $request->healthFacilityID,
        ]);

        Mail::to(Auth::user()->email)->send(new AppointmentConfirmationMail($appointment));

        return redirect()->route('appointments.index')->with('success', 'Jadwal pemeriksaan berhasil disimpan.');
    }


}

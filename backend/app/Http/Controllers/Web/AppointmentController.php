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
    # Read
    public function index()
    {
        $user = auth()->user();

        $appointments = Appointment::with(['doctor', 'healthFacility', 'appointmentStatus'])
            ->where('userID', $user->id)
            ->orderBy('dateTime', 'desc')
            ->get();

        $doctor = Appointment::with('doctor')
            ->where('userID', $user->id)
            ->get();

        return view('appointments.index', [
            'title' => 'My Appointments',
            'user' => $user,
            'appointments' => $appointments,
            'doctor' => $doctor,
        ]);
    }

    # Delete
    // public function destroy(Appointment $appointment)
    // {
    //     if ($appointment->userID !== Auth::id()) {
    //         abort(403);
    //     }

    //     $appointment->delete();

    //     return redirect()->route('appointments.index')->with('success', 'Appointment canceled.');
    // }

    # Create, flow 1: Facility -> Department, Doctor, Reward, Reason, Confirm (All in the same page, so if a department is chosen it filters for doctors available in the department) -> Store
    public function createWithFacility($facility_id)
    {
        $user = auth()->user();

        $facility = HealthFacility::with('type')->findOrFail($facility_id);

        $departments = HealthFacilityDepartment::with('department')
            ->where('healthFacilityID', $facility_id)
            ->get();
        
        $selectedDepartment = request('department_id');

        $doctorsQuery = Doctor::whereHas('healthFacilityDepartments', function ($query) use ($facility_id, $selectedDepartment) {
            $query->where('healthFacilityID', $facility_id);
            if ($selectedDepartment) {
                $query->where('departmentID', $selectedDepartment);
            }
        });

        $doctors = $doctorsQuery->get();
        $rewards = Reward::whereDate('expiryDate', '>=', now())->get();

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

    public function store(Request $request) {
        request()->validate([
            'doctorID' => 'required|exists:doctors,id',
            'healthFacilityID' => 'required|exists:health_facilities,id',
            'dateTime' => 'required|date|after:now',
            'rewardID' => 'nullable|exists:rewards,id',
            'reason' => 'nullable|string|max:400',
        ]);

        $appointment = Appointment::create([
            'dateTime' => $request->dateTime,
            'reason' => $request->reason,
            'userID' => Auth::id(),
            'doctorID' => $request->doctorID,
            'appointmentStatusID' => AppointmentStatus::where('name', 'Pending')->first()->id,
            'rewardID' => $request->rewardID,
            'healthFacilityID' => $request->healthFacilityID,
        ]);

        Mail::to(Auth::user()->email)->send(new AppointmentConfirmationMail($appointment));

        return redirect()->route('appointments.index')->with('success', 'Jadwal pemeriksaan berhasil disimpan.');
    }


}

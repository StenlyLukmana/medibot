@extends('components.layouts.main')

@section('body')
<div class="container mt-4">
    <h2>Book Appointment at {{ $facility->name }}</h2>

    <form action="{{ route('appointments.createWithFacility', $facility->id) }}" method="GET" class="mb-4">
        <label for="departmentID" class="form-label">Lihat dokter dalam departemen:</label>
        <select name="departmentID" id="departmentID" class="form-select" onchange="this.form.submit()">
            <option value="">Semua Departemen</option>
            @foreach($departments as $department)
                <option value="{{ $department->department->id }}" {{ $selectedDepartment == $department->department->id ? 'selected' : '' }}>
                    {{ $department->department->name }}
                </option>
            @endforeach
        </select>
    </form>

    <div class="row">
        @foreach($doctors as $doctor)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm p-3">
                    <h5 class="card-title">{{ $doctor->name }}</h5>
                    <p class="card-text">
                        Departemen: {{ $doctor->department->name ?? 'General' }} <br>
                        Kontak: {{ $doctor->contact ?? 'N/A' }}
                    </p>
                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="doctorID" value="{{ $doctor->id }}">
                        <input type="hidden" name="healthFacilityID" value="{{ $facility->id }}">
                        <div class="mb-2">
                            <input type="datetime-local" name="dateTime" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <select name="rewardID" class="form-select">
                                <option value="">Pilih Voucher Hadiah</option>
                                @foreach($rewards as $reward)
                                    <option value="{{ $reward->id }}">{{ $reward->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <textarea name="reason" class="form-control mb-2" placeholder="Alasan pemeriksaan (opsional)"></textarea>
                        <button type="submit" class="submit-button btn btn-primary w-100">Booking Pemeriksaan</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('components.layouts.main')

@section('body')

    <div class="appointments-container">
        @foreach($appointments as $appointment)
            <div class="appointment-card">
                <div class="appointment-card-content">
                    <div class="appointment-name">
                        Pemeriksaan dengan {{ $appointment->doctor->name }}
                    </div>
                    <div class="appointment-info">
                        <span><strong>Fasilitas Kesehatan:</strong> {{ $appointment->healthFacility->name }}</span>
                        <span><strong>Alasan:</strong> {{ $appointment->reason }}</span>
                        <span><strong>Status:</strong> {{ $appointment->appointmentStatus->name }}</span>
                        <span><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($appointment->date)->translatedFormat('d M Y') }}</span>
                        <span><strong>Waktu:</strong> {{ $appointment->start_time }} - {{ $appointment->end_time }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@extends('components.layouts.main')

@section('body')

    <div class="facility-container">
        @foreach($healthFacilities as $facility)
            <a href="{{ route('appointments.createWithFacility', $facility->id) }}" class="facility-card-link">
                <div class="facility-card">
                    <div class="facility-card-content">
                        <div class="facility-name">{{ $facility->name }}</div>
                        <div class="facility-contact">{{ $facility->contactNumber }}</div>
                        <div class="facility-info">
                            <span>Type: {{ $facility->type->type }}</span>
                            <span>Email: {{ $facility->email }}</span>
                            <span>Address: {{ $facility->address }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection

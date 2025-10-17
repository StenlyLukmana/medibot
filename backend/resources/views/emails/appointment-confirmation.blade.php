<!DOCTYPE html>
<html>
<body>
    <h2>Halo Yth.{{ $appointment->user->name }},</h2>
    <p>Jadwal pemeriksaan Anda sudah dikonfirmasi!</p>

    <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
    <p><strong>Facility:</strong> {{ $appointment->healthFacility->name }}</p>
    <p><strong>Date & Time:</strong> {{ $appointment->dateTime }}</p>
    <p><strong>Status:</strong> {{ $appointment->status->name }}</p>

    <p>Terima kasih sudah menggunakan Medibot.</p>
</body>
</html>

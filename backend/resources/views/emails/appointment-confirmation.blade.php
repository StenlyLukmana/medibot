<!DOCTYPE html>
<html>
<body>
    <h2>Halo Yth.{{ $appointment->user->name }},</h2>
    <p>Jadwal pemeriksaan Anda sudah dikonfirmasi!</p>

    <p><strong>Dokter:</strong> {{ $appointment->doctor->name }}</p>
    <p><strong>Lokasi:</strong> {{ $appointment->healthFacility->name }}</p>
    <p><strong>Tanggal & waktu:</strong> {{ $appointment->dateTime }}</p>

    <p>🤖 Terima kasih sudah menggunakan Medibot 🩺</p>
</body>
</html>

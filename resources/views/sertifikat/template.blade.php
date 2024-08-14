<!-- resources/views/sertifikat/template.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Sertifikat PKKMB</title>
    <style>
        /* Tambahkan styling sesuai kebutuhan */
    </style>
</head>

<body>
    <h1>Sertifikat PKKMB</h1>
    <p>Diberikan kepada:</p>
    <h2>{{ $mahasiswa->nama_mahasiswa }}</h2>
    <p>Program Studi: {{ $mahasiswa->nama_prodi }}</p>
    <p>Telah berhasil menyelesaikan PKKMB</p>
</body>

</html>

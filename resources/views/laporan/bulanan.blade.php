<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Konsultasi Bulan {{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</title>
    <style>
        /* Gaya CSS untuk laporan PDF Anda */
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt;
            margin: 20px; /* Margin di sekitar halaman PDF */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top; /* Menjaga konten di bagian atas sel */
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Konsultasi ID PROJECT</h1>
        <h2>Bulan {{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Tgl Temu</th>
                <th>Jam Temu</th>
                <th>Layanan</th>
                <th>Status</th>
                <th>Catatan Admin</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayats as $index => $riwayat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $riwayat->nama_lengkap ?? '-'}}</td>
                <td>{{ $riwayat->email ?? '-'}}</td>
                <td>{{ $riwayat->no_hp ?? '-'}}</td>
                <td>{{ \Carbon\Carbon::parse($riwayat->tanggal_temu)->translatedFormat('d M Y') ?? '-'}}</td>
                <td>{{ $riwayat->jam_temu ?? '-'}}</td>
                <td>{{ $riwayat->layanan ?? '-'}}</td>
                <td>{{ $riwayat->status ?? '-'}}</td>
                <td>{{ $riwayat->admin_notes ?? '-'}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">Tidak ada data laporan untuk bulan ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Batam, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        <br><br><br><br>
        (Nama Penanggung Jawab)
    </div>
</body>
</html>

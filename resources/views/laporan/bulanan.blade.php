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
            margin: 20px;
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
            vertical-align: top;
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
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .summary-section {
            margin: 30px 0;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .summary-item {
            background-color: white;
            padding: 10px;
            border-radius: 3px;
            border-left: 4px solid #007bff;
        }
        .summary-item h4 {
            margin: 0 0 5px 0;
            color: #333;
        }
        .summary-item .value {
            font-size: 18pt;
            font-weight: bold;
            color: #007bff;
        }
        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Konsultasi ID PROJECT</h1>
        <h2>Bulan {{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</h2>
    </div>

    <!-- Ringkasan Section -->
    <div class="summary-section">
        <h3>Ringkasan Laporan</h3>
        <div class="summary-grid">
            <div class="summary-item">
                <h4>Total Konsultasi</h4>
                <div class="value">{{ $riwayats->count() }}</div>
            </div>
            <div class="summary-item">
                <h4>Konsultasi Selesai</h4>
                <div class="value">{{ $riwayats->where('status', 'Selesai')->count() }}</div>
            </div>
            <div class="summary-item">
                <h4>Total Pendapatan</h4>
                <div class="value">Rp {{ number_format($riwayats->where('status', 'Selesai')->sum('harga'), 0, ',', '.') }}</div>
            </div>
            <div class="summary-item">
                <h4>Rata-rata per Konsultasi</h4>
                <div class="value">
                    @if($riwayats->where('status', 'Selesai')->count() > 0)
                        Rp {{ number_format($riwayats->where('status', 'Selesai')->sum('harga') / $riwayats->where('status', 'Selesai')->count(), 0, ',', '.') }}
                    @else
                        Rp 0
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Status Breakdown -->
        <h4 style="margin-top: 20px;">Breakdown Status:</h4>
        <table style="margin-top: 10px; width: 60%;">
            <tr>
                <th>Status</th>
                <th>Jumlah</th>
                <th>Persentase</th>
            </tr>
            <tr>
                <td>Selesai</td>
                <td>{{ $riwayats->where('status', 'Selesai')->count() }}</td>
                <td>{{ $riwayats->count() > 0 ? round(($riwayats->where('status', 'Selesai')->count() / $riwayats->count()) * 100, 1) : 0 }}%</td>
            </tr>
            <tr>
                <td>Menunggu</td>
                <td>{{ $riwayats->where('status', 'Menunggu')->count() }}</td>
                <td>{{ $riwayats->count() > 0 ? round(($riwayats->where('status', 'Menunggu')->count() / $riwayats->count()) * 100, 1) : 0 }}%</td>
            </tr>
            <tr>
                <td>Dibatalkan</td>
                <td>{{ $riwayats->where('status', 'Dibatalkan')->count() }}</td>
                <td>{{ $riwayats->count() > 0 ? round(($riwayats->where('status', 'Dibatalkan')->count() / $riwayats->count()) * 100, 1) : 0 }}%</td>
            </tr>
        </table>
    </div>

    <h3>Detail Konsultasi</h3>
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
                <th>Harga</th>
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
                <td class="text-right">
                    @if($riwayat->total_price)
                        Rp {{ number_format($riwayat->total_price, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
                <td class="text-center">
                    <span class="
                        @if($riwayat->status == 'Selesai') status-completed
                        @elseif($riwayat->status == 'Menunggu') status-pending
                        @elseif($riwayat->status == 'Dibatalkan') status-cancelled
                        @endif
                    " style="padding: 3px 8px; border-radius: 3px; font-size: 9pt;">
                        {{ $riwayat->status ?? '-' }}
                    </span>
                </td>
                <td>{{ $riwayat->admin_notes ?? '-'}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center">Tidak ada data laporan untuk bulan ini.</td>
            </tr>
            @endforelse
        </tbody>
        @if($riwayats->count() > 0)
        <tfoot>
            <tr style="background-color: #f8f9fa; font-weight: bold;">
                <td colspan="7" class="text-right">TOTAL PENDAPATAN:</td>
                <td class="text-right">Rp {{ number_format($riwayats->where('status', 'Selesai')->sum('total_price'), 0, ',', '.') }}</td>
                <td colspan="2"></td>
            </tr>
        </tfoot>
        @endif
    </table>

    <div class="footer">
        Batam, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        <br><br><br><br>
        (Nama Penanggung Jawab)
    </div>
</body>
</html>
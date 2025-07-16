@extends('customers.layouts.app')
@section('title', 'Status Pesanan & Invoice')
@section('content')
<div
    class="hero-section-100 py-20"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{
        asset('assets/wallpaperflare-cropped2.jpg')
    }}');"
>
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4 text-white">About ID PROJECT</h1>
            <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
            <p class="text-lg text-white">
                Learn more about our company, our mission, and our dedicated
                team of professionals.
            </p>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Status Pesanan & Invoice</h4>
        </div>

        <div class="card-body">
            @if($verifies->isEmpty())
            <div class="alert alert-info">
                Belum ada pesanan atau invoice yang tersedia.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Total Harga</th>
                            <th>Catatan Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($verifies as $verify)
                        <tr>
                            <td>{{ $verify->verify_id }}</td>
                            <td>{{ $verify->nama_lengkap}}</td>
                            <td>{{ \Carbon\Carbon::parse($verify->created_at)->format('d M Y H:i') }}</td> {{-- Pastikan format tanggal --}}
                            <td>{{ $verify->layanan ?? '-' }}</td> {{-- Tampilkan layanan --}}
                            <td>
                                <span class="badge
                                @if($verify->status == 'Selesai') bg-success
                                @elseif($verify->status == 'Diterima') bg-primary
                                @elseif($verify->status == 'On Progress') bg-info
                                @elseif($verify->status == 'Ditolak') bg-danger
                                @elseif($verify->status == 'Batal') bg-secondary
                                @else bg-warning text-dark @endif">
                                    {{ $verify->status }}
                                </span>
                            </td>
                            <td>
                                @if($verify->total_price)
                                Rp {{ number_format($verify->total_price, 0, ',', '.') }}
                                @else
                                -
                                @endif
                            </td>
                            <!-- <td>
                                @if($verify->invoice_path)
                                <i class="bi bi-file-earmark-pdf text-danger"></i> Tersedia
                                @else
                                <span class="text-muted">Belum tersedia</span>
                                @endif
                            </td> -->
                            <td>
                                <!-- {{-- Tampilkan catatan admin di sini --}} -->
                                {{ $verify->admin_notes ?? '-' }}
                            </td>
                            <!-- <td>
                                @if($verify->invoice_path)
                                <a href="{{ Storage::url($verify->invoice_path) }}"
                                    target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-download"></i> Lihat/Download
                                </a>
                                @endif
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
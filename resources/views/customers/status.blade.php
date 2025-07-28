@extends('customers.layouts.app')
@section('title', 'Status Pesanan & Invoice')
@section('content')
<div
    class="hero-section-100 py-20"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{
        asset('assets/wallpaperflare-cropped2.jpg')
    }}');">
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
    <div class="card shadow" style="margin: 0 20px;">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0 fw-bold">Status Pesanan & Invoice</h2>
        </div>

        <div class="card-body">
            @if($verifies->isEmpty())
            <div class="alert alert-info">
                Belum ada pesanan atau invoice yang tersedia.
            </div>
            @else
            <div class="table-responsive" style="margin: 0 15px;">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th style="padding: 15px 12px;">ID Pesanan</th>
                            <th style="padding: 15px 12px;">Nama</th>
                            <th style="padding: 15px 12px;">Tanggal</th>
                            <th style="padding: 15px 12px;">Layanan</th>
                            <th style="padding: 15px 12px;">Status</th>
                            <th style="padding: 15px 12px;">Total Harga</th>
                            <th style="padding: 15px 12px;">Catatan Admin</th>
                            <th style="padding: 15px 12px;">Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($verifies as $verify)
                        <tr>
                            <td style="padding: 15px 12px;">{{ $verify->verify_id }}</td>
                            <td style="padding: 15px 12px;">{{ $verify->nama_lengkap}}</td>
                            <td style="padding: 15px 12px;">{{ \Carbon\Carbon::parse($verify->created_at)->format('d M Y H:i') }}</td>
                            <td style="padding: 15px 12px;">{{ $verify->layanan ?? '-' }}</td>
                            <td style="padding: 15px 12px;">
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
                            <td style="padding: 15px 12px;">
                                @if($verify->total_price)
                                Rp {{ number_format($verify->total_price, 0, ',', '.') }}
                                @else
                                -
                                @endif
                            </td>
                            <td style="padding: 15px 12px;">
                                {{ $verify->admin_notes ?? '-' }}
                            </td>
                            <td style="padding: 15px 12px;">
                                @if($verify->invoice_path)
                                <a href="{{ route('invoice.download', $verify->id) }}"
                                    class="btn btn-sm btn-success"
                                    title="Download Invoice">
                                    <i class="fas fa-download"></i> Download
                                </a>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Responsive margin untuk tabel */
    @media (max-width: 576px) {
        .card {
            margin: 0 10px !important;
        }

        .table-responsive {
            margin: 0 5px !important;
        }
    }

    @media (min-width: 577px) and (max-width: 768px) {
        .card {
            margin: 0 25px !important;
        }

        .table-responsive {
            margin: 0 10px !important;
        }
    }

    @media (min-width: 769px) and (max-width: 992px) {
        .card {
            margin: 0 40px !important;
        }

        .table-responsive {
            margin: 0 15px !important;
        }
    }

    @media (min-width: 993px) {
        .card {
            margin: 0 60px !important;
        }

        .table-responsive {
            margin: 0 20px !important;
        }
    }

    /* Padding untuk sel tabel */
    .table> :not(caption)>*>* {
        padding: 15px 12px;
    }

    /* Hover effect */
    .table tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }
</style>
@endsection
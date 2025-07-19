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

<div class="container py-4" style="max-width: 95%; margin: 0 auto;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-list-check"></i> Status Pesanan & Invoice</h4>
        </div>

        <div class="card-body">
            @if($verifies->isEmpty())
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> Belum ada pesanan atau invoice yang tersedia.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped"style="margin-bottom: 0;"">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center fw-semibold" style="width: 10%; padding: 15px 12px;">
                                    <i class="bi bi-hash text-primary"></i> ID Pesanan
                                </th>
                                <th class="fw-semibold" style="width: 15%; padding: 15px 12px;">
                                    <i class="bi bi-person text-primary"></i> Nama Lengkap
                                </th>
                                <th class="text-center fw-semibold" style="width: 12%; padding: 15px 12px;">
                                    <i class="bi bi-calendar text-primary"></i> Tanggal
                                </th>
                                <th class="fw-semibold" style="width: 15%; padding: 15px 12px;">
                                    <i class="bi bi-gear text-primary"></i> Layanan
                                </th>
                                <th class="text-center fw-semibold" style="width: 10%; padding: 15px 12px;">
                                    <i class="bi bi-flag text-primary"></i> Status
                                </th>
                                <th class="text-end fw-semibold" style="width: 12%; padding: 15px 12px;">
                                    <i class="bi bi-currency-dollar text-primary"></i> Total Harga
                                </th>
                                <th class="fw-semibold" style="width: 26%; padding: 15px 12px;">
                                    <i class="bi bi-chat-text text-primary"></i> Catatan Admin
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($verifies as $verify)
                            <tr>
                                <td class="text-center align-middle" style="padding: 15px 12px;">
                                    <span class="badge bg-primary-subtle text-primary border border-primary">
                                        #{{ $verify->verify_id }}
                                    </span>
                                </td>
                                <td class="align-middle" style="padding: 15px 12px;">
                                    <div class="fw-semibold text-dark">{{ $verify->nama_lengkap }}</div>
                                </td>
                                <td class="text-center align-middle" style="padding: 15px 12px;">
                                    <div class="text-dark fw-medium">
                                        {{ \Carbon\Carbon::parse($verify->created_at)->format('d/m/Y') }}
                                    </div>
                                    <small class="text-primary">
                                        {{ \Carbon\Carbon::parse($verify->created_at)->format('H:i') }} WIB
                                    </small>
                                </td>
                                <td class="align-middle" style="padding: 15px 12px;">
                                    <div class="text-dark fw-medium">
                                        {{ $verify->layanan ?? 'Tidak ada layanan' }}
                                    </div>
                                </td>
                                <td class="text-center align-middle" style="padding: 15px 12px;">
                                    <span class="badge
                                        @if($verify->status == 'Selesai') bg-success
                                        @elseif($verify->status == 'Diterima') bg-primary
                                        @elseif($verify->status == 'On Progress') bg-info
                                        @elseif($verify->status == 'Ditolak') bg-danger
                                        @elseif($verify->status == 'Batal') bg-secondary
                                        @else bg-warning text-dark @endif
                                        px-3 py-2 fs-6">
                                        {{ $verify->status }}
                                    </span>
                                </td>
                                <td class="text-end align-middle" style="padding: 15px 12px;">
                                    @if($verify->total_price)
                                        <div class="fw-bold text-success fs-6">
                                            Rp {{ number_format($verify->total_price, 0, ',', '.') }}
                                        </div>
                                    @else
                                        <span class="text-muted fst-italic">Belum ditetapkan</span>
                                    @endif
                                </td>
                                <td class="align-middle" style="padding: 15px 12px;">
                                    @if($verify->admin_notes)
                                        <div class="text-dark" style="max-width: 250px; line-height: 1.4;">
                                            {{ $verify->admin_notes }}
                                        </div>
                                    @else
                                        <span class="text-muted fst-italic">Tidak ada catatan</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination jika ada -->
                @if(method_exists($verifies, 'links'))
                    <div class="d-flex justify-content-center p-4">
                        {{ $verifies->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>

<!-- Custom CSS untuk mobile responsiveness -->
<style>
/* Padding yang lebih baik untuk tabel */
.table > :not(caption) > * > * {
    padding: 15px 12px;
}

/* Memastikan teks terlihat dengan kontras yang baik */
.table td {
    color: #212529;
    font-weight: 500;
}

/* Header styling */
.table thead th {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    color: #495057;
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* Row hover effect yang lebih smooth */
.table tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
    transition: background-color 0.2s ease;
}

/* Badge styling improvements */
.badge {
    font-weight: 500;
    letter-spacing: 0.3px;
}

/* Responsive untuk mobile */
@media (max-width: 768px) {
    .table-responsive {
        border: none;
        margin: 10px; /* Margin lebih kecil di mobile */
    }
    
    .card {
        margin: 0 10px !important; /* Override margin di mobile */
    }
    
    .container {
        padding-left: 15px !important;
        padding-right: 15px !important;
    }
    
    .table thead {
        display: none;
    }
    
    .table, .table tbody, .table tr, .table td {
        display: block;
        width: 100%;
    }
    
    .table tr {
        border: 1px solid #dee2e6;
        margin-bottom: 15px;
        border-radius: 8px;
        padding: 20px;
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .table td {
        border: none;
        border-bottom: 1px solid #f1f3f4;
        position: relative;
        padding: 12px 0 12px 35% !important;
        text-align: left !important;
        margin-bottom: 8px;
    }
    
    .table td:before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 30%;
        font-weight: 600;
        color: #495057;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .table td:nth-child(1):before { content: "ID PESANAN"; }
    .table td:nth-child(2):before { content: "NAMA"; }
    .table td:nth-child(3):before { content: "TANGGAL"; }
    .table td:nth-child(4):before { content: "LAYANAN"; }
    .table td:nth-child(5):before { content: "STATUS"; }
    .table td:nth-child(6):before { content: "TOTAL"; }
    .table td:nth-child(7):before { content: "CATATAN"; }
    
    .table td:last-child {
        border-bottom: none;
    }
}

/* Desktop sticky header */
@media (min-width: 769px) {
    .table thead th {
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #f8f9fa !important;
    }
    
    .table-responsive {
        max-height: 70vh;
        overflow-y: auto;
    }
}

/* Card spacing */
.card {
    border-radius: 10px;
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 0 15px; /* Margin kiri-kanan untuk card */
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
    padding: 20px 25px;
}

.container {
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 20px !important;
    padding-right: 20px !important;
}

/* Responsive margin untuk berbagai ukuran layar */
@media (min-width: 576px) {
    .card {
        margin: 0 25px;
    }
    
    .container {
        padding-left: 30px !important;
        padding-right: 30px !important;
    }
}

@media (min-width: 768px) {
    .card {
        margin: 0 40px;
    }
    
    .container {
        padding-left: 40px !important;
        padding-right: 40px !important;
    }
}

@media (min-width: 1200px) {
    .card {
        margin: 0 60px;
    }
    
    .container {
        max-width: 1140px;
        margin: 0 auto;
    }
}
</style>
@endsection
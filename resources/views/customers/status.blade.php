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
            <h4 class="mb-0"><i class="bi bi-list-check"></i> Status Pesanan & Invoice</h4>
        </div>

        <div class="card-body p-0">
            @if($verifies->isEmpty())
                <div class="alert alert-info m-4">
                    <i class="bi bi-info-circle"></i> Belum ada pesanan atau invoice yang tersedia.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 10%;">
                                    <i class="bi bi-hash"></i> ID
                                </th>
                                <th style="width: 15%;">
                                    <i class="bi bi-person"></i> Nama
                                </th>
                                <th class="text-center" style="width: 12%;">
                                    <i class="bi bi-calendar"></i> Tanggal
                                </th>
                                <th style="width: 15%;">
                                    <i class="bi bi-gear"></i> Layanan
                                </th>
                                <th class="text-center" style="width: 10%;">
                                    <i class="bi bi-flag"></i> Status
                                </th>
                                <th class="text-end" style="width: 12%;">
                                    <i class="bi bi-currency-dollar"></i> Total
                                </th>
                                <th style="width: 26%;">
                                    <i class="bi bi-chat-text"></i> Catatan Admin
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($verifies as $verify)
                            <tr>
                                <td class="text-center align-middle">
                                    <code class="text-primary">#{{ $verify->verify_id }}</code>
                                </td>
                                <td class="align-middle">
                                    <div class="fw-semibold">{{ $verify->nama_lengkap }}</div>
                                </td>
                                <td class="text-center align-middle">
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($verify->created_at)->format('d/m/Y') }}<br>
                                        <span class="text-info">{{ \Carbon\Carbon::parse($verify->created_at)->format('H:i') }}</span>
                                    </small>
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-light text-dark border">
                                        {{ $verify->layanan ?? 'Tidak ada layanan' }}
                                    </span>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="badge
                                        @if($verify->status == 'Selesai') bg-success
                                        @elseif($verify->status == 'Diterima') bg-primary
                                        @elseif($verify->status == 'On Progress') bg-info
                                        @elseif($verify->status == 'Ditolak') bg-danger
                                        @elseif($verify->status == 'Batal') bg-secondary
                                        @else bg-warning text-dark @endif
                                        px-3 py-2">
                                        {{ $verify->status }}
                                    </span>
                                </td>
                                <td class="text-end align-middle">
                                    @if($verify->total_price)
                                        <div class="fw-bold text-success">
                                            Rp {{ number_format($verify->total_price, 0, ',', '.') }}
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($verify->admin_notes)
                                        <div class="text-wrap" style="max-width: 200px;">
                                            <small class="text-muted">
                                                <i class="bi bi-chat-square-text"></i>
                                                {{ Str::limit($verify->admin_notes, 80) }}
                                            </small>
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
                    <div class="d-flex justify-content-center mt-3 p-3">
                        {{ $verifies->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>

<!-- Custom CSS untuk mobile responsiveness -->
<style>
@media (max-width: 768px) {
    .table-responsive table {
        font-size: 0.875rem;
    }
    
    .table td, .table th {
        padding: 0.5rem;
        white-space: nowrap;
    }
    
    .table td div, .table td span {
        font-size: 0.8rem;
    }
    
    /* Stack pada mobile */
    .table thead {
        display: none;
    }
    
    .table, .table tbody, .table tr, .table td {
        display: block;
        width: 100%;
    }
    
    .table tr {
        border: 1px solid #dee2e6;
        margin-bottom: 1rem;
        border-radius: 0.375rem;
        padding: 0.75rem;
        background: white;
    }
    
    .table td {
        border: none;
        border-bottom: 1px solid #f8f9fa;
        position: relative;
        padding-left: 35% !important;
        text-align: left !important;
    }
    
    .table td:before {
        content: attr(data-label) ": ";
        position: absolute;
        left: 6px;
        width: 30%;
        white-space: nowrap;
        font-weight: bold;
        color: #495057;
    }
    
    .table td:first-child:before { content: "ID: "; }
    .table td:nth-child(2):before { content: "Nama: "; }
    .table td:nth-child(3):before { content: "Tanggal: "; }
    .table td:nth-child(4):before { content: "Layanan: "; }
    .table td:nth-child(5):before { content: "Status: "; }
    .table td:nth-child(6):before { content: "Total: "; }
    .table td:nth-child(7):before { content: "Catatan: "; }
}

@media (min-width: 769px) {
    .table th {
        position: sticky;
        top: 0;
        background-color: #212529;
        z-index: 10;
    }
}
</style>
@endsection
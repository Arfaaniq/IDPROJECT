<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat- ID PROJECT</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .text-kecil {
        font-size: 14px;
    }

    .text-lebih-kecil {
        font-size: 10px;
    }

    .notes-preview {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .badge-invoice {
        font-size: 0.8em;
    }
</style>

<body>
    @extends('layouts.app')
    @section('title', 'Riwayat')
    @section('content')

    <nav aria-label="breadcrumb" class="text-kecil">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat Verifikasi</li>
        </ol>
    </nav>

    <h2 class="black-text mb-4" style="font-size: x-large;">Riwayat Verifikasi Janji Temu</h2>

    {{-- Filter and Report Forms Container --}}
    <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
        {{-- History Filter Form --}}
        <form method="GET" action="{{ route('riwayat') }}" class="d-flex gap-3 align-items-end"
            style="font-size: small;">
            @csrf
            <div>
                <label for="filter_bulan" class="form-label">Bulan</label>
                <select name="bulan" id="filter_bulan" class="form-select text-kecil">
                    <option value="">Semua Bulan</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                        </option>
                        @endfor
                </select>
            </div>

            <div>
                <label for="filter_tahun" class="form-label text-kecil">Tahun</label>
                <select name="tahun" id="filter_tahun" class="form-select">
                    <option value="">Semua Tahun</option>
                    @foreach(range(now()->year, 2020) as $year)
                    <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}
                        class="text=kecil">
                        {{ $year }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="filter_status" class="form-label">Status</label>
                <select name="status" id="filter_status" class="form-select">
                    <option value="">Semua</option>
                    <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="On Progress" {{ request('status') == 'On Progress' ? 'selected' : '' }}>On Progress
                    </option>
                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Batal" {{ request('status') == 'Batal' ? 'selected' : '' }}>Batal</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('riwayat') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        {{-- Report Download Form --}}
        <form method="POST" action="{{ route('laporan.bulanini') }}" class="mt-3 mt-md-0">
            @csrf
            <div class="d-flex align-items-center gap-2">
                <label for="report_bulan" class="form-label mb-0" style="font-size: small;">Silakan pilih bulan:</label>
                <input type="month" id="report_bulan" name="bulan" class="form-control w-auto" required>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-printer"></i> Cetak Laporan Bulan Ini
                </button>
            </div>
        </form>
    </div>

    {{-- Alert Success/Error Messages --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Table Section --}}
    <div class="table-responsive bg-white p-4 shadow rounded" style="font-size: small;">
        <table class="table align-middle">
            <thead class="table-light">
                <tr style="border-top: 2px solid #dee2e6;">
                    <th style="color: #ff0000">ID</th>
                    <th style="color: #ff0000">Nama Lengkap</th>
                    <th style="color: #ff0000">Email</th>
                    <th style="color: #ff0000">No HP/WA</th>
                    <th style="color: #ff0000">Catatan User</th>
                    <th style="color: #ff0000">Tanggal Temu</th>
                    <th style="color: #ff0000">Jam Temu</th>
                    <th style="color: #ff0000">Layanan</th>
                    <th style="color: #ff0000">Gambar</th>
                    <th style="color: #ff0000">Catatan Admin</th>
                    <th style="color: #ff0000">Invoice</th>
                    <th style="color: #ff0000">Status</th>
                    <th style="color: #ff0000">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayats as $item)
                <tr>
                    <td>{{ $item->verify_id }}</td>
                    <td>{{ $item->nama_lengkap ?? '-'}}</td>
                    <td>{{ $item->email ?? '-'}}</td>
                    <td>{{ $item->no_hp ?? '-'}}</td>
                    <td>{{ $item->catatan ?? '-'}}</td>
                    <td>{{ $item->tanggal_temu ?? '-'}}</td>
                    <td>{{ $item->jam_temu ?? '-'}}</td>
                    <td>{{ $item->layanan ?? '-'}}</td>
                    <td>
                        @php $gambarList = explode(',', $item->gambar); @endphp
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#gambarModal-{{ $item->id }}" style="font-size: small;">
                            <i class="bi bi-eye"></i> View
                        </button>

                        {{-- Gambar Modal --}}
                        <div class="modal fade" id="gambarModal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Gambar Order #{{ $item->verify_id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-wrap gap-2">
                                        @foreach ($gambarList as $img)
                                        <img src="{{ asset('storage/' . $img) }}" alt="gambar" width="1000"
                                            class="rounded border">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    {{-- Admin Notes Column dengan preview --}}
                    <td>
                        @if($item->admin_notes)
                        <div class="notes-preview" title="{{ $item->admin_notes }}">
                            <small class="text-success">
                                <i class="bi bi-check-circle"></i>
                                {{ Str::limit($item->admin_notes, 30) }}
                            </small>
                        </div>
                        @else
                        <span class="text-muted">
                            <i class="bi bi-dash-circle"></i> Belum ada catatan
                        </span>
                        @endif
                    </td>

                    {{-- Invoice Column dengan info detail --}}
                    <td>
                        @if($item->invoice_id && $item->total_price)
                        <div>
                            <span class="badge bg-success badge-invoice">
                                <i class="bi bi-file-earmark-check"></i> {{ $item->invoice_id }}
                            </span>
                            <br>
                            <small class="text-success fw-bold">
                                Rp {{ number_format($item->total_price, 0, ',', '.') }}
                            </small>
                            @if($item->invoice_path)
                            <br>
                            <small class="text-primary">
                                <i class="bi bi-file-pdf"></i> PDF Ready
                            </small>
                            @endif
                        </div>
                        @else
                        <span class="text-muted">
                            <i class="bi bi-dash-circle"></i> Belum ada invoice
                        </span>
                        @endif
                    </td>

                    <td>
                        @switch($item->status)
                        @case('Menunggu')
                        <span class="badge bg-warning text-dark">🟡 Menunggu</span>
                        @break
                        @case('Diterima')
                        <span class="badge bg-success">🟢 Diterima</span>
                        @break
                        @case('Ditolak')
                        <span class="badge bg-danger">🔴 Ditolak</span>
                        @break
                        @case('On Progress')
                        <span class="badge bg-info text-dark">🔵 On Progress</span>
                        @break
                        @case('Selesai')
                        <span class="badge bg-primary">✅ Selesai</span>
                        @break
                        @case('Batal')
                        <span class="badge bg-secondary">❌ Batal</span>
                        @break
                        @endswitch
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i> Actions
                            </button>
                            <ul class="dropdown-menu">
                                {{-- Invoice Actions --}}
                                @if($item->status === 'Selesai' || $item->status === 'On Progress')
                                @if($item->invoice_path)
                                <li><a class="dropdown-item" href="{{ asset('storage/' . $item->invoice_path) }}" target="_blank">
                                        <i class="bi bi-file-earmark-pdf"></i> Lihat Invoice
                                    </a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#editInvoiceModal-{{ $item->id }}">
                                        <i class="bi bi-pencil"></i> Edit Invoice
                                    </a></li>
                                @elseif($item->invoice_id && $item->total_price)
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#editInvoiceModal-{{ $item->id }}">
                                        <i class="bi bi-pencil"></i> Edit Invoice
                                    </a></li>
                                @else
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#uploadInvoiceModal-{{ $item->id }}">
                                        <i class="bi bi-upload"></i> Buat Invoice
                                    </a></li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                @endif

                                {{-- Notes Action --}}
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#editAdminNotesModal-{{ $item->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                        {{ $item->admin_notes ? 'Edit Notes' : 'Add Notes' }}
                                    </a></li>
                            </ul>
                        </div>
                    </td>
                </tr>

                {{-- Admin Notes Modal --}}
                <div class="modal fade" id="editAdminNotesModal-{{ $item->id }}" tabindex="-1"
                    aria-labelledby="editAdminNotesModalLabel-{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAdminNotesModalLabel-{{ $item->id }}">
                                    {{ $item->admin_notes ? 'Edit' : 'Tambah' }} Catatan Admin untuk Order #{{ $item->verify_id }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('history.update.notes', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    @if($item->admin_notes)
                                    <div class="alert alert-info">
                                        <strong>Catatan saat ini:</strong><br>
                                        {{ $item->admin_notes }}
                                    </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="admin_notes-{{ $item->id }}" class="form-label">Catatan Admin:</label>
                                        <textarea class="form-control" id="admin_notes-{{ $item->id }}"
                                            name="admin_notes" rows="5"
                                            placeholder="Masukkan catatan admin untuk order ini...">{{ old('admin_notes', $item->admin_notes) }}</textarea>
                                        @error('admin_notes')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">
                                        {{ $item->admin_notes ? 'Update Catatan' : 'Simpan Catatan' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Upload Invoice Modal (untuk yang belum ada invoice) --}}
                <div class="modal fade" id="uploadInvoiceModal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Buat Invoice - Order #{{ $item->verify_id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('riwayat.upload.invoice', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="invoice_id-{{ $item->id }}" class="form-label">ID Invoice</label>
                                        <input type="text" class="form-control" id="invoice_id-{{ $item->id }}"
                                            name="invoice_id" value="{{ old('invoice_id') }}"
                                            placeholder="Contoh: INV-2024-001" required>
                                        @error('invoice_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="total_price-{{ $item->id }}" class="form-label">Total Harga (Rp)</label>
                                        <input type="number" class="form-control" id="total_price-{{ $item->id }}"
                                            name="total_price" value="{{ old('total_price') }}"
                                            placeholder="Contoh: 150000" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="invoice_file-{{ $item->id }}" class="form-label">File Invoice (PDF) - Opsional</label>
                                        <input type="file" class="form-control" id="invoice_file-{{ $item->id }}"
                                            name="invoice_file" accept=".pdf">
                                        <small class="text-muted">Bisa diupload nanti jika belum ready</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Invoice</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Edit Invoice Modal (untuk yang sudah ada invoice) --}}
                <div class="modal fade" id="editInvoiceModal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Invoice - Order #{{ $item->verify_id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('riwayat.upload.invoice', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- @method('PUT') -->
                                <div class="modal-body">
                                    @if($item->invoice_id || $item->total_price)
                                    <div class="alert alert-info">
                                        <strong>Data Invoice saat ini:</strong><br>
                                        ID: {{ $item->invoice_id ?? 'Belum ada' }}<br>
                                        Total: {{ $item->total_price ? 'Rp ' . number_format($item->total_price, 0, ',', '.') : 'Belum ada' }}
                                    </div>
                                    @endif

                                    <div class="mb-3">
                                        <label for="edit_invoice_id-{{ $item->id }}" class="form-label">ID Invoice</label>
                                        <input type="text" class="form-control" id="edit_invoice_id-{{ $item->id }}"
                                            name="invoice_id" value="{{ old('invoice_id', $item->invoice_id) }}"
                                            placeholder="Contoh: INV-2024-001" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="edit_total_price-{{ $item->id }}" class="form-label">Total Harga (Rp)</label>
                                        <input type="number" class="form-control" id="edit_total_price-{{ $item->id }}"
                                            name="total_price" value="{{ old('total_price', $item->total_price) }}"
                                            placeholder="Contoh: 150000" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="edit_invoice_file-{{ $item->id }}" class="form-label">
                                            {{ $item->invoice_path ? 'Update File Invoice (PDF)' : 'Upload File Invoice (PDF)' }}
                                        </label>
                                        <input type="file" class="form-control" id="edit_invoice_file-{{ $item->id }}"
                                            name="invoice_file" accept=".pdf">
                                        @if($item->invoice_path)
                                        <small class="text-success">
                                            <i class="bi bi-check-circle"></i> File saat ini tersedia. Upload file baru jika ingin mengganti.
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Update Invoice</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="13" class="text-center py-4">Tidak ada data riwayat yang ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $riwayats->links('pagination::bootstrap-4') }}
        </div>
    </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto close alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });

        // Add confirmation for invoice updates
        document.querySelectorAll('form[action*="update.invoice"]').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                if (!confirm('Apakah Anda yakin ingin mengupdate data invoice ini?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>
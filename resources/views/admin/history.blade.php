<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
</head>
<style>
.text-kecil {
    font-size: 14px;
}

.text-lebih-kecil {
    font-size: 10px;
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

    <form method="GET" action="{{ route('riwayat') }}" class="d-flex gap-3 mb-4 align-items-end"
        style="font-size: small;">
        @csrf
        <div style="font-size:small;">
            <label for="bulan" class="form-label">Bulan</label>
            <select name="bulan" id="bulan" class="form-select text-kecil">
                <option value="">Semua Bulan</option>
                @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                    </option>
                    @endfor
            </select>
        </div>

        <div>
            <label for="tahun" class="form-label text-kecil">Tahun</label>
            <select name="tahun" id="tahun" class="form-select">
                <option value="">Semua Tahun</option>
                @foreach(range(now()->year, 2020) as $year)
                <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }} class="text=kecil">
                    {{ $year }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
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

    <div class="table-responsive bg-white p-4 shadow rounded" style="font-size: small;">
        </thead>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr style="border-top: 2px solid #dee2e6;">
                        <th style="color: #ff0000">ID</th>
                        <th style="color: #ff0000">Nama Lengkap</th>
                        <th style="color: #ff0000">Email</th>
                        <th style="color: #ff0000">No HP/WA</th>
                        <th style="color: #ff0000">Catatan</th>
                        <th style="color: #ff0000">Tanggal Temu</th>
                        <th style="color: #ff0000">Jam Temu</th>
                        <th style="color: #ff0000">Layanan</th>
                        <th style="color: #ff0000">Gambar</th>
                        <th style="color: #ff0000">ID Invoice</th>
                        <th style="color: #ff0000">Total Harga</th>
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
                            <button class="btn btn-sm btn-transparent" data-bs-toggle="modal"
                                data-bs-target="#gambarModal-{{ $item->id }}" style="font-size: small;">
                                View
                            </button>

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
                        <td>{{ $item->invoice_id ?? '-' }}</td>
                        <td>
                            @if($item->total_price)
                            Rp {{ number_format($item->total_price, 0, ',', '.') }}
                            @else
                            -
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
                        <td
                            style="display: grid; grid-auto-flow: column; gap: 0.5rem; justify-content: start; align-items: center;">
                            @if($item->status === 'Selesai' || $item->status === 'On Progress' )
                            @if($item->invoice_path)
                            <a href="{{ asset('storage/' . $item->invoice_path) }}" target="_blank"
                                class="btn btn-sm btn-success">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat Invoice
                            </a>
                            @else
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#uploadInvoiceModal-{{ $item->id }}">
                                <i class="bi bi-upload"></i> Invoice
                            </button>
                            @endif
                            @endif
                            <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                data-bs-target="#editAdminNotesModal-{{ $item->id }}">
                                <i class="bi bi-pencil-square"></i> Notes
                            </button>
                        </td>
                    </tr>
                    <!-- //Catatan admin -->
                    <div class="modal fade" id="editAdminNotesModal-{{ $item->id }}" tabindex="-1"
                        aria-labelledby="editAdminNotesModalLabel-{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editAdminNotesModalLabel-{{ $item->id }}">Edit Catatan
                                        Admin untuk Order #{{ $item->verify_id }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('history.update.notes', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') {{-- Gunakan metode PUT untuk update --}}
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="admin_notes-{{ $item->id }}" class="form-label">Catatan:</label>
                                            <textarea class="form-control" id="admin_notes-{{ $item->id }}"
                                                name="admin_notes"
                                                rows="5">{{ old('admin_notes', $item->admin_notes) }}</textarea>
                                            @error('admin_notes')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Catatan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan modal upload invoice -->
                    <div class="modal fade" id="uploadInvoiceModal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Upload Invoice - Order #{{ $item->verify_id }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('riwayat.upload.invoice', $item->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Add Invoice ID field -->
                                        <div class="mb-3">
                                            <label for="invoice_id-{{ $item->id }}" class="form-label">ID
                                                Invoice</label>
                                            <input type="text" class="form-control" id="invoice_id-{{ $item->id }}"
                                                name="invoice_id" required>
                                            @error('invoice_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Add Total Price field -->
                                        <div class="mb-3">
                                            <label for="total_price-{{ $item->id }}" class="form-label">Total Harga
                                                (Rp)</label>
                                            <input type="number" class="form-control" id="total_price-{{ $item->id }}"
                                                name="total_price" required>
                                        </div>

                                        <!-- Existing file upload -->
                                        <!---<div class="mb-3">
                                            <label for="invoice-{{ $item->id }}" class="form-label">File Invoice (PDF)</label>
                                            <input type="file" class="form-control" id="invoice-{{ $item->id }}" name="invoice" accept=".pdf" required>
                                        </div>-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data riwayat</td>
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
        <script>
        document.getElementById('filter-button').addEventListener('click', function() {
            // Debugging: lihat parameter yang akan dikirim
            const form = this.closest('form');
            const formData = new FormData(form);
            console.log([...formData.entries()]);
        });
        </script>
</body>

</html>
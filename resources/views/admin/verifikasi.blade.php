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
</head>

<body>
    @extends('layouts.app')
    @section('title', 'Verifikasi Jadwal')

    @section('content')
    <!-- Breadcrumb: judul menu yang dipilih, nanti tampilan di halaman Home / Dashboard / Verifikasi Jadwal -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active" aria-current="page">Verifikasi Jadwal</li>
        </ol>
    </nav>
    <!-- Atur sesuai dengan nama username di Auth -->
    <strong>
        @php use Illuminate\Support\Facades\Auth; @endphp
        <h2 class="black-text">Selamat datang, {{ Auth::user()->username }} 👋🏻</h2>
    </strong>

    <!-- Catatan x : reject dan ✅ : approve -->
    <div class="d-flex justify-content-between mb-4">
        <!-- Button yang disable untuk Catatan Approve & Reject -->
        <div class="d-flex gap-3">
            <div class="d-flex align-items-center text-success">
                <i class="bi bi-check-circle-fill me-1"></i>
                <span>Approve janji temu</span>
            </div>
            <div class="d-flex align-items-center text-danger">
                <i class="bi bi-x-circle-fill me-1"></i>
                <span>Reject janji temu</span>
            </div>
        </div>
        <!-- Search & Filter -->
        <div class="d-flex gap-3">
            <!-- Search Input -->
            <div class="input-group">
                <form action="{{ route('verifikasi') }}" method="GET" class="d-flex mb-3">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari nama lengkap"
                        value="{{ request('search') }}" style="max-width: 200px;">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                </form>

            </div>
            <!-- Ini filter berdasarkan -->
            <div class="dropdown">
                <button class="btn btn-outline-danger dropdown-toggle d-flex align-items-center gap-2" type="button"
                    id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-funnel-fill"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                    <li><a class="dropdown-item" href="{{ route('verifikasi', ['filter' => 'Diterima']) }}">🟢
                            Diterima</a></li>
                    <li><a class="dropdown-item" href="{{ route('verifikasi', ['filter' => 'Ditolak']) }}">🔴
                            Ditolak</a></li>
                    <li><a class="dropdown-item" href="{{ route('verifikasi', ['filter' => 'Menunggu']) }}">🟡
                            Menunggu</a></li>
                    <li><a class="dropdown-item" href="{{ route('verifikasi', ['filter' => 'id']) }}">Urutan ID</a></li>
                    <li><a class="dropdown-item" href="{{ route('verifikasi') }}">Tanpa Filter</a></li>
                </ul>

            </div>
        </div>
    </div>
    <!-- Kontainer Utama -->
    <div class="container mt-4 shadow rounded p-4 bg-white">
        <!-- Table Title -->
        <h5 class="mb-3" class="fs-1">Pesanan Janji Temu yang Masuk</h5>
        <!-- Table -->
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
                        <th style="color: #ff0000">Status</th>
                        <th style="color: #ff0000">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($verifies as $verify)
                    <tr style="border-top: 1px solid #dee2e6;">
                        <td>{{ $verify->id }}</td>
                        <td>{{ $verify->nama_lengkap }}</td>
                        <td>{{ $verify->email }}</td>
                        <td>{{ $verify->no_hp ?? '-'}}</td>
                        <td>{{ $verify->catatan ?? '-' }}</td>
                        <td>{{ $verify->tanggal_temu ?? '-'}}</td>
                        <td>{{ $verify->jam_temu ?? '-'}}</td>
                        <td>{{ $verify->layanan ?? '-'}}</td>
                        <td>
                            @php
                            $gambarList = explode(',', $verify->gambar);
                            $jumlahGambar = count($gambarList);
                            @endphp

                            <button class="btn btn-sm btn-transparent" data-bs-toggle="modal"
                                data-bs-target="#gambarModal-{{ $verify->id }}">
                                ({{ $jumlahGambar }}) Lihat Gambar
                            </button>
                            <!-- Modal tampilkan semua gambar -->
                            <div class="modal fade" id="gambarModal-{{ $verify->id }}" tabindex="-1"
                                aria-labelledby="gambarModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Gambar Order {{ $verify->id }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body d-flex flex-wrap gap-2 justify-content-start">
                                            @if($verify->gambar)
                                            @foreach(explode(',', $verify->gambar) as $image)
                                            <img src="{{ asset('storage/' . $image) }}" width="100">
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @switch($verify->status)
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
                            @if ($verify->status !== 'Selesai' && $verify->status !== 'Batal' && $verify->status !== 'Ditolak')
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ubah Status
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if ($verify->status === 'Menunggu')
                                    <li><a class="dropdown-item status-action" href="#" data-status="Approved" data-bs-toggle="modal" data-bs-target="#approveModal-{{ $verify->id }}">Approve</a></li>
                                    <li><a class="dropdown-item status-action" href="#" data-status="Rejected" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $verify->id }}">Reject</a></li>
                                    @elseif ($verify->status === 'Diterima')
                                    <li>
                                        <a class="dropdown-item status-action" href="#"
                                            data-status="On Progress"
                                            data-verify-id="{{ $verify->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#statusChangeModal">On Progress</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item status-action" href="#"
                                            data-status="Batal"
                                            data-verify-id="{{ $verify->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#statusChangeModal">Batal</a>
                                    </li>
                                    @elseif ($verify->status === 'On Progress')
                                    <li>
                                        <a class="dropdown-item status-action" href="#"
                                            data-status="Selesai"
                                            data-verify-id="{{ $verify->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#finishModal-{{ $verify->id }}">Selesai</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item status-action" href="#"
                                            data-status="Batal"
                                            data-verify-id="{{ $verify->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#cancelModal-{{ $verify->id }}">Batal</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            @else
                            <span class="badge bg-secondary">Tidak ada aksi</span>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="statusChangeModal" tabindex="-1" aria-labelledby="statusChangeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="statusChangeModalLabel">Konfirmasi Perubahan Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="statusChangeForm" method="POST" action="{{ route('verifikasi.onProgress', $verify->id) }}"> {{-- Action akan diisi via JS --}}
                                    @csrf
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin mengubah status menjadi <strong id="modalStatusText"></strong>?</p>
                                        {{-- Input hidden untuk menyimpan ID verifikasi dan status --}}
                                        <input type="hidden" name="verify_id" id="modalVerifyId">
                                        <input type="hidden" name="status" id="modalStatusInput">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Ya, Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Konfirmasi Batal -->
                    <div class="modal fade" id="cancelModal-{{ $verify->id }}" tabindex="-1"
                        aria-labelledby="cancelModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Batal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body fs-6">
                                    Apakah Anda yakin ingin menandai janji temu ini sebagai <strong>batal</strong>?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('verifikasi.cancel', $verify->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Ya, Tandai Selesai</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Konfirmasi Selesai -->
                    <div class="modal fade" id="finishModal-{{ $verify->id }}" tabindex="-1"
                        aria-labelledby="finishModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Selesai</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menandai janji temu ini sebagai <strong>selesai</strong>?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('verifikasi.finish', $verify->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Ya, Tandai Selesai</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ini saat di approve akan muncul modal  -->
                    <div class="modal fade" id="approveModal-{{ $verify->id }}" tabindex="-1"
                        aria-labelledby="approveModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="approveModalLabel">Konfirmasi Approve</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menyetujui janji temu ini?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('verifikasi.approve', $verify->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>

                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ini saat di reject akan muncul modal -->
                    <div class="modal fade" id="rejectModal-{{ $verify->id }}" tabindex="-1"
                        aria-labelledby="rejectModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="rejectModalLabel">Konfirmasi Reject</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menolak janji temu ini?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('verifikasi.reject', $verify->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                    </form>

                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $verifies->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusChangeModal = document.getElementById('statusChangeModal');
            statusChangeModal.addEventListener('show.bs.modal', function(event) {
                // Button yang mengaktifkan modal
                var button = event.relatedTarget;

                // Ekstrak informasi dari atribut data-*
                var status = button.getAttribute('data-status');
                var verifyId = button.getAttribute('data-verify-id');

                // Perbarui konten modal
                var modalStatusText = statusChangeModal.querySelector('#modalStatusText');
                var modalVerifyIdInput = statusChangeModal.querySelector('#modalVerifyId');
                var modalStatusInput = statusChangeModal.querySelector('#modalStatusInput');
                var statusChangeForm = statusChangeModal.querySelector('#statusChangeForm');

                modalStatusText.textContent = status;
                modalVerifyIdInput.value = verifyId;
                modalStatusInput.value = status;

                // Atur rutenya 
                // statusChangeForm.action = `/verifikasi/${verifyId}/OnProgress`; // Contoh: /verifikasi/onProgress/123
            });
        });
    </script>
</body>

</html>
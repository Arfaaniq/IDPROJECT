@extends('layouts.app')

@section('title', 'Kelola Blog')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>

    <strong>
        <h1 class="text-xl font-bold text-gray-900 mb-6">
            Selamat datang, {{ Auth::user()->name }} 👋🏻
        </h1>
    </strong>

    <div class="d-flex justify-content-between align-items-center mb-4 mt-4 flex-wrap gap-2">
        <button type="button"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition font-semibold text-sm"
            data-bs-toggle="modal" data-bs-target="#tambahBlogModal">
            Tambah Blog
        </button>

        <form method="GET" action="{{ route('admin.blog.index') }}" class="d-flex align-items-center gap-2">
            <input type="text" name="search" placeholder="Pencarian berdasarkan judul..."
                   value="{{ request('search') }}"
                   class="form-control" style="max-width: 200px;" />
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <div class="container mt-4 shadow rounded p-4 bg-white">
        <h5 class="mb-3">Daftar Blog</h5>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr style="border-top: 2px solid #dee2e6;">
                        <th style="color: #ff0000" class="px-3 py-2">Id</th>
                        <th style="color: #ff0000" class="px-3 py-2">Judul</th>
                        <th style="color: #ff0000" class="px-3 py-2">Kategori</th>
                        <th style="color: #ff0000" class="px-3 py-2">Deskripsi</th>
                        <th style="color: #ff0000" class="px-3 py-2">Gambar Blog</th>
                        <th style="color: #ff0000" class="px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($blogs as $index => $blog)
                        <tr style="border-top: 1px solid #dee2e6;">
                            <td class="px-3 py-2">{{ $index + 1 }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ \Illuminate\Support\Str::limit($blog->judul, 25) }}</td>
                            <td class="px-3 py-2">{{ $blog->kategori }}</td>
                            <td class="px-3 py-2">{{ \Illuminate\Support\Str::limit($blog->deskripsi, 40) }}</td>
                            <td class="px-3 py-2">
                                @if ($blog->gambar)
                                    <img src="{{ asset('storage/' . $blog->gambar) }}"
                                         alt="Gambar Blog"
                                         class="w-24 h-16 object-cover rounded-md shadow-sm border border-gray-300" />
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-2">
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editModal{{ $blog->id }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    <form action="{{ route('admin.blog.destroy', $blog) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus blog ini?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal{{ $blog->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $blog->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content rounded-4 shadow">
                                    <div class="modal-header border-bottom-0 pb-0"> {{-- Menghilangkan border bawah dan padding bawah --}}
                                        <h5 class="modal-title" id="editModalLabel{{ $blog->id }}">Edit Blog</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4 pt-0"> {{-- Menyesuaikan padding atas --}}
                                        <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label for="judul{{ $blog->id }}" class="form-label fw-semibold">Judul</label>
                                                <input id="judul{{ $blog->id }}" type="text" name="judul" class="form-control" value="{{ $blog->judul }}" required />
                                                <div class="invalid-feedback">Mohon masukkan judul blog.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="kategori{{ $blog->id }}" class="form-label fw-semibold">Kategori</label>
                                                <input id="kategori{{ $blog->id }}" type="text" name="kategori" class="form-control" value="{{ $blog->kategori }}" required />
                                                <div class="invalid-feedback">Mohon masukkan kategori blog.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="deskripsi{{ $blog->id }}" class="form-label fw-semibold">Deskripsi</label>
                                                <textarea id="deskripsi{{ $blog->id }}" name="deskripsi" rows="4" class="form-control" required>{{ $blog->deskripsi }}</textarea>
                                                <div class="invalid-feedback">Mohon masukkan deskripsi blog.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="gambar{{ $blog->id }}" class="form-label fw-semibold">Ganti Gambar (opsional)</label>
                                                <input id="gambar{{ $blog->id }}" type="file" name="gambar" class="form-control" accept="image/*" />
                                                @if ($blog->gambar)
                                                    <small class="text-muted mt-1 d-block">Gambar saat ini: {{ basename($blog->gambar) }}</small>
                                                @endif
                                            </div>

                                            <div class="d-flex justify-content-end gap-2 mt-4"> {{-- Menambahkan gap dan margin-top --}}
                                                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary rounded-pill px-4">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data blog.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahBlogModal" tabindex="-1" aria-labelledby="tambahBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0 pb-0"> {{-- Menghilangkan border bawah dan padding bawah --}}
                    <h5 class="modal-title" id="tambahBlogModalLabel">Tambah Blog Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-0"> {{-- Menyesuaikan padding atas --}}
                    <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">Judul</label>
                            <input id="judul" type="text" name="judul" class="form-control" value="{{ old('judul') }}" required />
                            <div class="invalid-feedback">Mohon masukkan judul blog.</div>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label fw-semibold">Kategori</label>
                            <input id="kategori" type="text" name="kategori" class="form-control" value="{{ old('kategori') }}" required />
                            <div class="invalid-feedback">Mohon masukkan kategori blog.</div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
                            <div class="invalid-feedback">Mohon masukkan deskripsi blog.</div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-semibold">Upload Gambar</label>
                            <input id="gambar" type="file" name="gambar" class="form-control" accept="image/*" required />
                            <div class="invalid-feedback">Mohon upload gambar blog.</div>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-4"> {{-- Menambahkan gap dan margin-top --}}
                            <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (() => {
            'use strict'
            // Ambil semua form yang ingin kita terapkan gaya validasi Bootstrap kustom
            const forms = document.querySelectorAll('.needs-validation')

            // Loop di atas dan mencegah pengiriman
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
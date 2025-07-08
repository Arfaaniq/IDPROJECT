<!-- File: resources/views/customers/orderservice.blade.php -->
@extends('customers.layouts.app')

@section('title', 'Form Order Layanan')
@section('content')
<div class="hero-section-100 py-20 hero-with-bg">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4 text-white">Appoinment ID PROJECT</h1>
            <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
            <p class="text-lg text-white">
                    Learn more about our company, our mission, and our dedicated team of professionals.
                </p>
        </div>
    </div>
</div>
<div class="container py-5">
    <h2 class="mb-4 text-center text-danger">Pesan Layanan</h2>
    <!-- menampilkan success jika berhasil di submit -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- menampilkan error validasi -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('orderservice') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <!-- Nama diambil dari data user -->
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap', Auth::check() ? Auth::user()->name : '') }}" {{ Auth::check() ? 'readonly' : 'required' }}>
                <!-- Menampilkan error jika nama invalid -->
                @error('nama_lengkap')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <!-- Email diambil dari data si user -->
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}" {{ Auth::check() ? 'readonly' : 'required' }}>
                <!-- Menampilkan error jika email invalid -->
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">No. Handphone/WA</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required>
                <!-- Menampilkan error jika no hp invalid -->
                @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Tanggal Temu</label>
                <input type="date" class="form-control @error('tanggal_temu') is-invalid @enderror" name="tanggal_temu" value="{{ old('tanggal_temu') }}">
               <!-- Menampilkan error jika tanggal temu invalid -->
                @error('tanggal_temu')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Jam Temu</label>
                <input type="time" class="form-control @error('jam_temu') is-invalid @enderror" name="jam_temu" value="{{ old('jam_temu') }}">
                <!-- Menampilkan error jika jam temu invalid -->
                @error('jam_temu')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-12">
                <label class="form-label">Pilih Layanan (maksimal 3)</label>
                <div class="row">
                    @php
                    $layananList = [
                    'Desain Rumah',
                    'Renovasi Bangunan',
                    'Civil',
                    'Pembangunan/Build',
                    'Interior & Eksterior',
                    'Maintenance/Perbaikan',
                    'Landscape',
                    ];
                    @endphp

                    @foreach($layananList as $layanan)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="layanan[]" value="{{ $layanan }}"
                                {{ in_array($layanan, old('layanan', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $layanan }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Menampilan error jika layanan tidak dipilih, dan maksimal 3 pilihan -->
                @error('layanan')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar:</label>
                <!-- Dapat mengupload lebihd dari satu gambar -->
                <input type="file" class="form-control @error('gambar.*') is-invalid @enderror" name="gambar[]" multiple>
                <!-- Menampilkan error jika gambar invalid -->
                @error('gambar.*')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <!-- Pesan spesifik untuk ukuran/tipe file -->
                @if ($errors->has('gambar'))
                <small class="text-danger">Ukuran file gambar maksimal 5MB dan format JPG, JPEG, PNG.</small>
                @endif
            </div>

            <div class="col-md-12">
                <label class="form-label">Catatan / Keluhan</label>
                <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" rows="3">{{ old('catatan') }}</textarea>
                @error('catatan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input @error('captcha') is-invalid @enderror" type="checkbox" name="captcha" required>
                    <label class="form-check-label">Saya bukan robot</label>
                    @error('captcha')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-danger px-5">Pesan</button>
            </div>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Kelola Portofolio')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active" aria-current="page">Portofolio</li>
    </ol>
</nav>

<strong>
    <h1 class="text-xl font-bold text-gray-900 mb-6">
        Selamat datang, {{ Auth::user()->name }}
    </h1>
</strong>

<!-- card ikon tambah -->
<div class="row mt-4">
    <div class="col-md-3 mb-3">
        <div class="card">
            <img src="{{ asset('images/unduhan.jpeg') }}" class="card-img-top shadow-xl" alt="Interior" style="height: 350px;
                    object-fit: cover;">
            <div class="card-body text-center position-relative shadow">
                <div class="position-absolute top-0 start-50 translate-middle">
                    <a href="{{ route('projects.create') }}"
                        class="btn btn-danger rounded-circle shadow d-flex justify-content-center align-items-center"
                        style="width: 30px; height: 30px; font-size: 1.2rem;">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
                <p class="card-text mt-2">Tambah Gambar</p>
            </div>
        </div>
    </div>

    @foreach($projects as $project)
    <div class="col-md-3">
        <div class="card">
            <img src="{{ asset('storage/' . $project->image_path) }}" class="card-img-top shadow-xl"
                alt="{{ $project->name }}" style="height: 350px; object-fit: cover;">
            <div class="card-body text-center position-relative shadow">
                <p class="card-text mt-2">"{{ $project->name }}"</p>
            </div>

            <!-- tombol hapus galeri -->
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                class="position-absolute top-0 end-0 m-2">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="btn btn-sm btn-danger rounded-circle shadow d-flex justify-content-center align-items-center"
                    style="width: 30px; height: 30px; font-size: 0.9rem;" onclick="return confirm('Hapus gambar ini?')">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach

    <!-- Add Project Modal -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Project Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</div>
</div>
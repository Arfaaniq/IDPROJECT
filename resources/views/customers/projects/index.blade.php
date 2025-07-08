@extends('customers.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5 judul">Project Kami</h2>
    <div class="row justify-content-center">
        @foreach ($projects as $project)
        <div class="col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
            <div class="card project-card border-0 shadow-sm position-relative overflow-hidden"
                style="width: 100%; max-width: 300px;">
                <img src="{{ asset('storage/' . $project->image_path) }}" class="card-img-top img-fluid"
                    alt="{{ $project->name }}" style="height: 300px; object-fit: cover;">
                <div class="overlay d-flex align-items-center position-fixed">
                    <div class="text-white text-center">
                        <h5>{{ $project->name }}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.judul {
    font-size: 2rem;
    /* Atau gunakan ukuran seperti 24px, 32px, dll */
    font-weight: bold;
}

.project-card {
    transition: transform 0.3s ease;
    cursor: pointer;
    border-radius: 10px;
}

.project-card:hover {
    transform: scale(1.03);
}

.project-card .overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    top: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    transition: top 0.3s ease;
    border-radius: 10px;
}

.project-card:hover .overlay {
    top: 0;
}
</style>
@endsection
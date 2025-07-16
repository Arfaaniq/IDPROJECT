@extends('customers.layouts.app')

@section('content')
<div
    class="hero-section-100 py-20 bg-cover bg-center bg-no-repeat"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('assets/wallpaperflare-cropped2.jpg') }}');"
>
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4 text-white">Portfolio ID PROJECT</h1>
            <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
            <p class="text-lg text-white">
                Learn more about our company, our mission, and our dedicated
                team of professionals.
            </p>
        </div>
    </div>
</div>

<div class="container mx-auto py-10 px-4">
    <h2 class="text-3xl font-bold text-center mb-8">Project Kami</h2>

    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($projects as $project)
        <div class="relative group overflow-hidden rounded-lg shadow hover:shadow-lg transform hover:scale-105 transition">
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->name }}"
                class="w-full h-60 object-cover">
            <div
                class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                <h5 class="text-white text-lg font-semibold">{{ $project->name }}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@extends('customers.layouts.app')
@section('title', $item->judul)

@section('content')
<div class="container mx-auto px-4 py-6 pt-20 max-w-4xl">
    
    {{-- Gambar Blog --}}
    @if($item->gambar)
        <div class="mb-6 overflow-hidden rounded-lg shadow-md">
            <img src="{{ asset('storage/' . $item->gambar) }}" 
                 alt="{{ $item->judul }}" 
                 class="w-full h-auto rounded-lg shadow transition duration-300 ease-in-out" />
        </div>
    @endif

    {{-- Judul --}}
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-4">{{ $item->judul }}</h1>

    {{-- Tanggal Publikasi --}}
    <p class="text-center text-gray-500 text-sm mb-6">
        Dipublikasikan pada: {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y, H:i A') }}
    </p>

    {{-- Deskripsi Blog --}}
    <article class="text-gray-800 mb-8 leading-relaxed" style="text-align: justify;">
        {!! nl2br(e($item->deskripsi)) !!}
    </article>

    {{-- Tombol Kembali --}}
    <div class="mb-10">
        <a href="{{ route('blog.index') }}"
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white text-sm px-5 py-2 rounded transition duration-300">
            ← Kembali ke Blog
        </a>
    </div>

    {{-- Komentar --}}
    <section class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Komentar</h2>

        {{-- Form Komentar --}}
        @auth
            <form action="{{ route('comments.store', $item->id) }}" method="POST" class="mb-6">
                @csrf
                <textarea name="body" rows="4" 
                          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" 
                          placeholder="Tulis komentar Anda..."></textarea>
                <button type="submit" 
                        class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition duration-300">
                    Kirim Komentar
                </button>
            </form>
        @else
            <p class="mb-6 text-gray-600">
                Silakan <a href="{{ route('login') }}" class="text-blue-500 underline hover:text-blue-700">login</a> untuk menulis komentar.
            </p>
        @endauth

        {{-- Daftar Komentar --}}
        @forelse($item->comments as $comment)
            <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                <p class="text-gray-800">{{ $comment->body }}</p>
                <p class="text-sm text-gray-500 mt-2">
                    Oleh <span class="font-semibold">{{ $comment->user->name }}</span> 
                    pada {{ $comment->created_at->translatedFormat('d F Y, H:i') }}
                </p>
            </div>
        @empty
            <p class="text-gray-600">Belum ada komentar.</p>
        @endforelse
    </section>
</div>
@endsection
@extends('customers.layouts.app')
@section('title', 'Blog Us - ID PROJECT')

@section('content')

<!-- <div class="hero-section-100 py-auto">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4 text-white">Blog ID PROJECT</h1>
            <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
            <p class="text-lg text-white">
                Learn more about our company, our mission, and our dedicated team of professionals.
            </p>
        </div>
    </div>
</div> -->
<div class="hero-section-100 py-20 hero-with-bg">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4 text-white">Blog ID PROJECT</h1>
            <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
            <p class="text-lg text-white">
                    Learn more about our company, our mission, and our dedicated team of professionals.
                </p>
        </div>
    </div>
</div>
<section class="py-12 bg-base-200">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-6">Layanan Profesional Kami</h2>
        <p class="text-center text-base-content opacity-70 mb-10">
            Kami menyediakan berbagai layanan profesional untuk kebutuhan Anda
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <div class="lg:col-span-2 space-y-8">
                @foreach ($blog as $item)
                    <div class="card card-side bg-base-100 shadow-xl flex-col md:flex-row">
                        @php
                            $imagePath = $item->gambar ? asset('storage/' . $item->gambar) : asset('images/default.jpg');
                        @endphp

                        <figure class="md:w-1/3 relative h-64 md:h-auto overflow-hidden">
                            <img src="{{ $imagePath }}" alt="{{ $item->judul }}" class="w-full h-full object-cover absolute inset-0 z-0" />
                            <div class="absolute inset-0 z-20 p-6 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-white font-bold text-xl mb-2">{{ $item->kategori }}</h3>
                                    <h4 class="text-white font-bold">Profesional</h4>
                                </div>
                                {{-- Warna oren dihilangkan dengan menghapus div ini --}}
                            </div>
                        </figure>


                        <div class="card-body md:w-2/3">
                            <div class="text-sm opacity-70">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                            <h3 class="card-title text-2xl">{{ $item->judul }}</h3>
                            <p>{{ Str::limit(strip_tags($item->deskripsi), 120) }}</p>
                            <div class="card-actions justify-end">
                                <a href="{{ route('blog.show', $item->id) }}" class="btn btn-link text-[#FF0000] hover:text-[#cc0000]">
                                    Read More
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="lg:col-span-1">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-[#FF0000] mb-4">Search</h3>
                            <form action="{{ route('blog.search') }}" method="GET" class="join w-full">
                                <input type="text" name="query" class="input input-bordered join-item w-full" placeholder="Search..." />
                                <button class="btn bg-[#FF0000] text-white join-item hover:bg-[#cc0000]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div>
                            <h3 class="text-2xl font-bold text-[#FF0000] mb-4">Recent Posts</h3>
                            <div class="space-y-4">
                                @foreach ($recentPosts as $recent)
                                    @php
                                        $recentImage = $recent->gambar ? asset('storage/' . $recent->gambar) : asset('images/default.jpg');
                                    @endphp
                                    <div class="flex gap-3">
                                        <div class="w-20 h-20 flex-shrink-0">
                                            <img src="{{ $recentImage }}" alt="{{ $recent->judul }}" class="w-full h-full object-cover rounded-md" />
                                        </div>
                                        <div>
                                            <a href="{{ route('blog.show', $recent->id) }}" class="font-semibold hover:text-[#FF0000] transition-colors">
                                                {{ Str::limit($recent->judul, 40) }}
                                            </a>
                                            <p class="text-sm opacity-70">{{ \Carbon\Carbon::parse($recent->created_at)->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

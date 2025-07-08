@extends('customers.layouts.app') @section('title', 'Service Us - ID PROJECT')
@section('content')

<!-- Hero Section for About Page -->
<div class="hero-section-100 py-20 hero-with-bg">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4 text-white">
                Service ID PROJECT
            </h1>
            <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
            <p class="text-lg text-white">
                Learn more about our company, our mission, and our dedicated
                team of professionals.
            </p>
        </div>
    </div>
</div>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">
            Layanan Yang Kami Tawarkan
        </h2>
        <p class="text-center text-gray-700 mb-12">
            Kami menyediakan berbagai layanan
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Service 1 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-home text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" class="hover:underline"
                        >INTERIOR & EKSTERIOR</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa untuk mempercantik tampilan rumah, apartement, kantor,
                    gedung dan lain-lain
                </p>
            </div>

            <!-- Service 2 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-tools text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" class="hover:underline"
                        >RENOVASI</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa renovasi rumah, kantor, gedung, apartement dan banyak
                    lagi
                </p>
            </div>

            <!-- Service 3 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-road text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" class="hover:underline"
                        >CIVIL</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa pembangunan jalan raya, jembatan, fly over, underpass
                    dan lain-lain
                </p>
            </div>

            <!-- Service 4 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-tree text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" v class="hover:underline"
                        >LANDSCAPE</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa pembuatan taman rumah, kolam, taman cafe, taman hiburan
                    dan lain-lain
                </p>
            </div>

            <!-- Service 5 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-truck text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" class="hover:underline"
                        >MELAYANI LUAR KOTA</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Agar lebih dekat dengan Anda, Kami Melayani Jasa Renovasi &
                    Build untuk Luar Kota
                </p>
            </div>

            <!-- Service 6 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-building text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" class="hover:underline"
                        >BUILD</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa pembangunan rumah, gedung, kantor, apartement dan
                    lain-lain
                </p>
            </div>

            <!-- Service 7 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-wrench text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" class="hover:underline"
                        >MAINTENANCE</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa perbaikan untuk alat elektronik, septic tank dan
                    lain-lain
                </p>
            </div>

            <!-- Service 8 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-pencil-ruler text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" class="hover:underline"
                        >ELEKTRIKAL</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa design gambar 2d dan 3D serta RAB untuk pembangunan
                    tempat impianmu
                </p>
            </div>

            <!-- Service 9 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center"
            >
                <div class="service-icon">
                    <i class="fas fa-bolt text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="{{ route('contact') }}" class="hover:underline"
                        >RENOVASI</a
                    >
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa instalasi alat-alat listrik, mesin di rumah, kantor,
                    gedung dan lain-lain
                </p>
            </div>
        </div>
        <br />
        <h3 class="text-project-red font-bold mb-3">
            <a href="{{ route('contact') }}" class="hover:underline"
                >More Detail</a
            >
        </h3>
    </div>
</section>

<section class="py-16 bg-gray-900 text-white">
    <!-- style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{
        asset('assets/wallpaperflare-cropped2.jpg')
    }}');" -->
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Hubungi Kami Sekarang</h2>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a
                    href=""
                    class="btn bg-project-red hover:bg-red-700 text-white px-8 py-3 rounded-full"
                    >Contact Us</a
                >
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-start max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold mb-1">Testimoni</h2>
            <p class="text-gray-700 mb-8">Lihat Review Client Kami disini.</p>

            <div class="w-full bg-white p-6 rounded-lg shadow-md">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div class="w-full md:w-1/3 flex justify-center">
                        <img
                            src="https://placehold.co/300x600/f5f5f5/cccccc?text=Mobile+App"
                            alt="Mobile App"
                            class="w-48"
                        />
                    </div>
                    <div class="w-full md:w-2/3">
                        <p class="text-gray-700 mb-4 text-sm">
                            "Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non
                            proident."
                        </p>
                    </div>
                </div>

                <div class="flex justify-center mt-6">
                    <div class="flex gap-2">
                        <span
                            class="testimonial-dot w-2 h-2 rounded-full bg-project-red"
                        ></span>
                        <span
                            class="testimonial-dot w-2 h-2 rounded-full bg-gray-300"
                        ></span>
                        <span
                            class="testimonial-dot w-2 h-2 rounded-full bg-gray-300"
                        ></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

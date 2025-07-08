@extends('customers.layouts.app') @section('title', 'home - ID PROJECT')
@section('content')

<!-- Hero Section dengan Image Slider -->
<section class="relative h-[60vh] overflow-hidden">
    <!-- Image Slider Container -->
    <div class="carousel w-full h-full" id="heroCarousel">
        <!-- Slide 1 -->
        <div id="slide1" class="carousel-item relative w-full h-full">
            <img
                src="{{ asset('/assets/img1.jpeg') }}"
                class="w-full h-full object-cover"
                alt="Hero Image 1" />
            <!-- Overlay dengan gradient -->
            <div
                class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent"></div>

            <!-- Content overlay -->
            <div class="absolute inset-0 flex items-center justify-start">
                <div class="text-white ml-16 max-w-2xl">
                    <h1 class="text-5xl font-bold mb-4 leading-tight">
                        Welcome to Our <span class="text-red-500">PROJECT</span>
                    </h1>
                    <p class="text-xl mb-8 opacity-90">
                        One Stop Service untuk semua kebutuhan project Anda
                    </p>
                    <div class="flex gap-4">
                        <button
                            class="btn bg-red-500 text-white hover:bg-red-600 border-none px-8">
                            Get Started
                        </button>
                        <button
                            class="btn btn-outline border-white text-white hover:bg-white hover:text-black px-8">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div id="slide2" class="carousel-item relative w-full h-full">
            <img
                src="{{ asset('/assets/img2.jpeg') }}"
                class="w-full h-full object-cover"
                alt="Hero Image 2" />
            <div
                class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent"></div>

            <div class="absolute inset-0 flex items-center justify-start">
                <div class="text-white ml-16 max-w-2xl">
                    <h1 class="text-5xl font-bold mb-4 leading-tight">
                        Professional <span class="text-red-500">Services</span>
                    </h1>
                    <p class="text-xl mb-8 opacity-90">
                        Solusi terbaik dengan kualitas premium untuk bisnis Anda
                    </p>
                    <div class="flex gap-4">
                        <button
                            class="btn bg-red-500 text-white hover:bg-red-600 border-none px-8">
                            Our Services
                        </button>
                        <button
                            class="btn btn-outline border-white text-white hover:bg-white hover:text-black px-8">
                            Portfolio
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div id="slide3" class="carousel-item relative w-full h-full">
            <img
                src="{{ asset('/assets/img3.jpeg') }}"
                class="w-full h-full object-cover"
                alt="Hero Image 3" />
            <div
                class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent"></div>

            <div class="absolute inset-0 flex items-center justify-start">
                <div class="text-white ml-16 max-w-2xl">
                    <h1 class="text-5xl font-bold mb-4 leading-tight">
                        Innovation &
                        <span class="text-red-500">Excellence</span>
                    </h1>
                    <p class="text-xl mb-8 opacity-90">
                        Bergabunglah dengan ribuan klien yang telah mempercayai
                        kami
                    </p>
                    <div class="flex gap-4">
                        <button
                            class="btn bg-red-500 text-white hover:bg-red-600 border-none px-8">
                            Contact Us
                        </button>
                        <button
                            class="btn btn-outline border-white text-white hover:bg-white hover:text-black px-8">
                            About Us
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Arrows -->
    <div
        class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <button
            onclick="previousSlide()"
            class="btn btn-circle bg-white/20 backdrop-blur-md border-none text-white hover:bg-white/30">
            <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button
            onclick="nextSlide()"
            class="btn btn-circle bg-white/20 backdrop-blur-md border-none text-white hover:bg-white/30">
            <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    <!-- Slide Indicators -->
    <div
        class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex gap-2">
        <button
            onclick="goToSlide(1)"
            class="indicator-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-all duration-300"
            data-slide="1"></button>
        <button
            onclick="goToSlide(2)"
            class="indicator-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-all duration-300"
            data-slide="2"></button>
        <button
            onclick="goToSlide(3)"
            class="indicator-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-all duration-300"
            data-slide="3"></button>
    </div>
</section>

<script>
    let currentSlide = 1;
    const totalSlides = 3;
    let autoSlideInterval;

    // Function to go to specific slide
    function goToSlide(slideNumber) {
        currentSlide = slideNumber;
        updateSlider();
        updateIndicators();
        resetAutoSlide();
    }

    // Function to go to next slide
    function nextSlide() {
        currentSlide = currentSlide >= totalSlides ? 1 : currentSlide + 1;
        updateSlider();
        updateIndicators();
        resetAutoSlide();
    }

    // Function to go to previous slide
    function previousSlide() {
        currentSlide = currentSlide <= 1 ? totalSlides : currentSlide - 1;
        updateSlider();
        updateIndicators();
        resetAutoSlide();
    }

    // Update slider position
    function updateSlider() {
        const carousel = document.getElementById("heroCarousel");
        const slideWidth = carousel.offsetWidth;
        carousel.scrollTo({
            left: (currentSlide - 1) * slideWidth,
            behavior: "smooth",
        });
    }

    // Update indicator dots
    function updateIndicators() {
        const indicators = document.querySelectorAll(".indicator-dot");
        indicators.forEach((indicator, index) => {
            if (index + 1 === currentSlide) {
                indicator.classList.remove("bg-white/50");
                indicator.classList.add("bg-white", "scale-125");
            } else {
                indicator.classList.remove("bg-white", "scale-125");
                indicator.classList.add("bg-white/50");
            }
        });
    }

    // Auto slide function
    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            nextSlide();
        }, 5000); // 5 detik
    }

    // Reset auto slide timer
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Initialize slider when page loads
    document.addEventListener("DOMContentLoaded", function() {
        updateIndicators();
        startAutoSlide();

        // Pause auto slide when user hovers over the hero section
        const heroSection = document.querySelector("section");
        heroSection.addEventListener("mouseenter", () => {
            clearInterval(autoSlideInterval);
        });

        heroSection.addEventListener("mouseleave", () => {
            startAutoSlide();
        });
    });

    // Handle window resize
    window.addEventListener("resize", () => {
        updateSlider();
    });
</script>

<!-- About Us Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="w-full md:w-1/2">
                <img
                    src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=1000"
                    alt="Modern Interior Design"
                    class="rounded-tl-3xl rounded-br-3xl rounded-tr-none rounded-bl-none shadow-lg w-full" />
            </div>
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
                <p class="text-gray-700 mb-4">
                    Perusahaan kami didirikan pada tahun 2020 dan telah
                    mendedikasikan diri dalam industri konstruksi dengan fokus
                    khusus pada renovasi. Seiring berjalannya waktu, kami terus
                    berupaya untuk melakukan inovasi yang berkelanjutan.
                </p>
                <p class="text-gray-700 mb-4">
                    Sehingga saat ini kami memiliki sumber daya yang handal
                    diberbagai bidang sehingga dapat menyajikan beragam produk
                    dan layanan dalam kerangka
                    <span class="font-semibold">One Stop Service</span>.
                </p>
                <p class="text-gray-700">
                    Portofolio layanan kami mencakup Desain, Pembangunan,
                    Renovasi, Desain Interior, Lansekap, Pemeliharaan, Layanan
                    Teknik Sipil dan Layanan Listrik.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Key Features Section -->
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">100+ PROJECT</h3>
                    <p class="text-gray-700">
                        Kami berpengalaman lebih dari 100 project dan kami juga
                        berpartner dengan banyak brand untuk wujudkan impianmu.
                    </p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">100+ PROJECT</h3>
                    <p class="text-gray-700">
                        Kami berpengalaman lebih dari 100 project dan kami juga
                        berpartner dengan banyak brand untuk wujudkan impianmu.
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">100+ PROJECT</h3>
                    <p class="text-gray-700">
                        Kami berpengalaman lebih dari 100 project dan kami juga
                        berpartner dengan banyak brand untuk wujudkan impianmu.
                    </p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fas fa-comments"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Free Konsultasi</h3>
                    <p class="text-gray-700">
                        Kami menawarkan konsultasi gratis untuk membantu Anda
                        memperoleh informasi dan rekomendasi untuk kebutuhan
                        anda.
                    </p>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fas fa-comments"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Free Konsultasi</h3>
                    <p class="text-gray-700">
                        Kami menawarkan konsultasi gratis untuk membantu Anda
                        memperoleh informasi dan rekomendasi untuk kebutuhan
                        anda.
                    </p>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fas fa-comments"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">Free Konsultasi</h3>
                    <p class="text-gray-700">
                        Kami menawarkan konsultasi gratis untuk membantu Anda
                        memperoleh informasi dan rekomendasi untuk kebutuhan
                        anda.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
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
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-home text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" class="hover:underline">INTERIOR & EKSTERIOR</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa untuk mempercantik tampilan rumah, apartement, kantor,
                    gedung dan lain-lain
                </p>
            </div>

            <!-- Service 2 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-tools text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" class="hover:underline">RENOVASI</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa renovasi rumah, kantor, gedung, apartement dan banyak
                    lagi
                </p>
            </div>

            <!-- Service 3 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-road text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" class="hover:underline">CIVIL</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa pembangunan jalan raya, jembatan, fly over, underpass
                    dan lain-lain
                </p>
            </div>

            <!-- Service 4 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-tree text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" v class="hover:underline">LANDSCAPE</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa pembuatan taman rumah, kolam, taman cafe, taman hiburan
                    dan lain-lain
                </p>
            </div>

            <!-- Service 5 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-truck text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" class="hover:underline">MELAYANI LUAR KOTA</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Agar lebih dekat dengan Anda, Kami Melayani Jasa Renovasi &
                    Build untuk Luar Kota
                </p>
            </div>

            <!-- Service 6 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-building text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" class="hover:underline">BUILD</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa pembangunan rumah, gedung, kantor, apartement dan
                    lain-lain
                </p>
            </div>

            <!-- Service 7 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-wrench text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" class="hover:underline">MAINTENANCE</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa perbaikan untuk alat elektronik, septic tank dan
                    lain-lain
                </p>
            </div>

            <!-- Service 8 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-pencil-ruler text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" class="hover:underline">ELEKTRIKAL</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa design gambar 2d dan 3D serta RAB untuk pembangunan
                    tempat impianmu
                </p>
            </div>

            <!-- Service 9 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-bolt text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a href="#" class="hover:underline">RENOVASI</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    Jasa instalasi alat-alat listrik, mesin di rumah, kantor,
                    gedung dan lain-lain
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Appointment Form Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-project-red mb-12">
            Buat Janji Temu
        </h2>

        <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <input
                                type="text"
                                placeholder="Nama Lengkap"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <input
                                type="email"
                                placeholder="Email"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <input
                                type="tel"
                                placeholder="No. Handphone/WA"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <textarea
                                placeholder="Catatan/Keluhan"
                                class="textarea textarea-bordered w-full h-40"></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <input
                                type="date"
                                placeholder="Tanggal temu"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">
                                Jam Operasional:
                            </p>
                            <p class="text-sm text-gray-600 mb-4">
                                Senin/Minggu : 09.00 AM - 17.00 PM
                            </p>
                        </div>
                        <div>
                            <select class="select select-bordered w-full">
                                <option value="" disabled selected>
                                    Pilih Jam Mulai
                                </option>

                                <option value="09:00">09:00 AM</option>
                                <option value="09:15">09:15 AM</option>
                                <option value="09:20">09:20 AM</option>
                                <option value="09:25">09:25 AM</option>
                                <option value="09:30">09:30 AM</option>
                                <option value="09:35">09:35 AM</option>
                                <option value="09:40">09:40 AM</option>
                                <option value="09:45">09:45 AM</option>
                                <option value="09:50">09:50 AM</option>
                                <option value="09:55">09:55 AM</option>

                                <option value="10:00">10:00 AM</option>
                                <option value="10:15">10:15 AM</option>
                                <option value="10:20">10:20 AM</option>
                                <option value="10:25">10:25 AM</option>
                                <option value="10:30">10:30 AM</option>
                                <option value="10:35">10:35 AM</option>
                                <option value="10:40">10:40 AM</option>
                                <option value="10:45">10:45 AM</option>
                                <option value="10:50">10:50 AM</option>
                                <option value="10:55">10:55 AM</option>

                                <option value="11:00">11:00 AM</option>
                                <option value="11:15">11:15 AM</option>
                                <option value="11:20">11:20 AM</option>
                                <option value="11:25">11:25 AM</option>
                                <option value="11:30">11:30 AM</option>
                                <option value="11:35">11:35 AM</option>
                                <option value="11:40">11:40 AM</option>
                                <option value="11:45">11:45 AM</option>
                                <option value="11:50">11:50 AM</option>
                                <option value="11:55">11:55 AM</option>

                                <option value="12:00">12:00 PM</option>
                                <option value="12:15">12:15 PM</option>
                                <option value="12:20">12:20 PM</option>
                                <option value="12:25">12:25 PM</option>
                                <option value="12:30">12:30 PM</option>
                                <option value="12:35">12:35 PM</option>
                                <option value="12:40">12:40 PM</option>
                                <option value="12:45">12:45 PM</option>
                                <option value="12:50">12:50 PM</option>
                                <option value="12:55">12:55 PM</option>

                                <option value="13:00">01:00 PM</option>
                                <option value="13:15">01:15 PM</option>
                                <option value="13:20">01:20 PM</option>
                                <option value="13:25">01:25 PM</option>
                                <option value="13:30">01:30 PM</option>
                                <option value="13:35">01:35 PM</option>
                                <option value="13:40">01:40 PM</option>
                                <option value="13:45">01:45 PM</option>
                                <option value="13:50">01:50 PM</option>
                                <option value="13:55">01:55 PM</option>

                                <option value="14:00">02:00 PM</option>
                                <option value="14:15">02:15 PM</option>
                                <option value="14:20">02:20 PM</option>
                                <option value="14:25">02:25 PM</option>
                                <option value="14:30">02:30 PM</option>
                                <option value="14:35">02:35 PM</option>
                                <option value="14:40">02:40 PM</option>
                                <option value="14:45">02:45 PM</option>
                                <option value="14:50">02:50 PM</option>
                                <option value="14:55">02:55 PM</option>

                                <option value="15:00">03:00 PM</option>
                                <option value="15:15">03:15 PM</option>
                                <option value="15:20">03:20 PM</option>
                                <option value="15:25">03:25 PM</option>
                                <option value="15:30">03:30 PM</option>
                                <option value="15:35">03:35 PM</option>
                                <option value="15:40">03:40 PM</option>
                                <option value="15:45">03:45 PM</option>
                                <option value="15:50">03:50 PM</option>
                                <option value="15:55">03:55 PM</option>

                                <option value="16:00">04:00 PM</option>
                                <option value="16:15">04:15 PM</option>
                                <option value="16:20">04:20 PM</option>
                                <option value="16:25">04:25 PM</option>
                                <option value="16:30">04:30 PM</option>
                            </select>
                        </div>

                        <div>
                            <p class="font-medium mb-3">Pilih Layanan</p>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Renovasi</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Civil</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Landscape</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Melayani Luar Kota</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Build</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Maintenance</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Design</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Elektrikal</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <p class="font-medium mb-3">Pilih Metode</p>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Diskusi Online</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">Diskusi Offline</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                class="checkbox checkbox-sm" />
                            <span class="text-sm">Saya bukan robot</span>
                            <img
                                src="https://www.gstatic.com/recaptcha/api2/logo_48.png"
                                alt="reCAPTCHA"
                                class="h-8" />
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <a
                        href="{{ auth()->check() ? route('orderservice.form') : route('login') }}"
                        class="btn btn-error text-white px-12 rounded-full">
                        Buat Janji Temu
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2">Proyek Kami</h2>
        <div class="flex justify-center mb-16">
            <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                <div
                    class="w-10 h-2 bg-gray-800 rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row gap-12">
                <!-- Project Menu -->
                <div class="w-full md:w-1/4">
                    <div class="space-y-6 relative">
                        <div
                            class="project-menu-item text-project-red font-semibold">
                            Proyek Design
                        </div>
                        <div class="project-menu-item">Proyek Build</div>
                        <div class="project-menu-item">Proyek Renovasi</div>
                        <div class="project-menu-item">Proyek Interior</div>
                        <div class="project-menu-item">Proyek Eksterior</div>
                        <div class="project-menu-item">Proyek Landscape</div>
                        <div class="project-menu-item">Proyek Civil</div>

                        <!-- Vertical Line -->
                        <div
                            class="absolute top-0 bottom-0 right-0 w-px bg-gray-300 hidden md:block"></div>
                    </div>
                </div>

                <!-- Project Content -->
                <div class="w-full md:w-3/4">
                    <div class="project-content">
                        <h3 class="text-xl font-medium mb-6">
                            Perumahan Tiban Patam Lestari
                        </h3>
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="w-full md:w-3/5">
                                <p class="text-gray-700 mb-4">
                                    Qui laudantium consequatur laborum sit qui
                                    ad sapiente dila parde sonata raqer a videna
                                    mareta paulona marka
                                </p>
                                <p class="text-gray-700 mb-4">
                                    Et nobis maiores eius. Voluptatibus ut enim
                                    blanditiis atque harum sint. Laborum eos
                                    ipsum ipsa odit magni. Incidunt hic ut
                                    molestiae aut qui.
                                </p>
                                <p class="text-gray-700">
                                    Est repellat minima eveniet eius et quis
                                    magni nihil. Consequatur dolorem quaerat
                                    quos qui similique accusamus nostrum rem
                                    vero
                                </p>
                            </div>
                            <div class="w-full md:w-2/5">
                                <img
                                    src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1470"
                                    alt="Perumahan Tiban Patam Lestari"
                                    class="w-full h-auto rounded-lg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
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
                            class="w-48" />
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
                            class="testimonial-dot w-2 h-2 rounded-full bg-project-red"></span>
                        <span
                            class="testimonial-dot w-2 h-2 rounded-full bg-gray-300"></span>
                        <span
                            class="testimonial-dot w-2 h-2 rounded-full bg-gray-300"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="min-h-screen relative bg-[#3b3b3b]">
    <div class="absolute inset-0 bg-black/30 backdrop-blur-[1px]"></div>

    <div
        class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4 py-8">
        <h1
            class="text-white font-bold text-4xl lg:text-6xl text-center mb-12 drop-shadow-2xl">
            Preview Reels Terbaru
        </h1>

        <div class="w-full max-w-7xl">
            <div
                id="embedsPreview"
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($recentEmbeds as $embed)
                <div class="card bg-base-100 shadow-xl border border-base-300">
                    <div class="card-body p-4">
                        @if($embed->embed_url)
                        <iframe
                            src="{{ $embed->embed_url }}"
                            width="100%"
                            height="400"
                            frameborder="0"
                            scrolling="no"
                            allowtransparency="true"
                            class="rounded-lg"
                            style="
                                min-height: 531px;
                                max-width: 326px;
                                margin: 0 auto;
                            "></iframe>
                        @else
                        <div
                            class="bg-gradient-to-br from-purple-400 via-pink-400 to-orange-400 rounded-lg p-4 flex items-center justify-center text-white font-bold"
                            style="height: 400px">
                            <div class="text-center">
                                <div class="text-3xl mb-2">📱</div>
                                <div class="text-sm">Instagram Reel</div>
                                <div class="text-xs opacity-75">Preview</div>
                            </div>
                        </div>
                        @endif

                        <div class="mt-2 text-xs text-base-content/70">
                            {{ $embed->formatted_posted_at }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center text-white">
                    Belum ada embed tersedia.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2 judul">Project Kami</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($projects as $project)
            <div class="project-card border-0 shadow-sm position-relative overflow-hidden rounded-lg">
                <img
                    src="{{ asset('storage/' . $project->image_path) }}"
                    alt="{{ $project->name }}"
                    class="w-full h-64 object-cover">
                <div class="overlay">
                    <div class="text-white text-center px-3">
                        <h5 class="text-xl font-semibold">{{ $project->name }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Contact Us Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2">Hubungi Kami</h2>
        <div class="flex justify-center mb-4">
            <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                <div
                    class="w-10 h-2 bg-gray-800 rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
            </div>
        </div>
        <p class="text-center text-gray-700 mb-12">
            Lorem ipsum Necessitatibus eius consequatur ex aliquid fuga eum
            quidem sint consectetur velit
        </p>

        <!-- Map -->
        <div class="w-full h-96 bg-gray-300 mb-12 rounded-lg overflow-hidden">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.5744113084522!2d104.00204025653267!3d1.049643199733973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98d54d7caf241%3A0xa361b2e811a92d7a!2sid.project!5e0!3m2!1sid!2sid!4v1745357954729!5m2!1sid!2sid"
                width="100%"
                height="100%"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Contact Info -->
            <div class="w-full md:w-1/3">
                <div class="space-y-8">
                    <!-- Location -->
                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">Location</h3>
                            <p class="text-gray-700">
                                Town House Buena Central Park<br />
                                Blok Lexington No. 112 B, Kota Batam, Kep. Riau.
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">Phone</h3>
                            <p class="text-gray-700">
                                0778 - 2552963<br />
                                0812 - 7123 - 8443
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">Email</h3>
                            <p class="text-gray-700">
                                id.project.official@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="w-full md:w-2/3">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input
                            type="text"
                            placeholder="Your Name"
                            class="input input-bordered w-full" />
                        <input
                            type="email"
                            placeholder="Your Email"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="mb-4">
                        <input
                            type="text"
                            placeholder="Subject"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="mb-6">
                        <textarea
                            placeholder="Message"
                            class="textarea textarea-bordered w-full h-40"></textarea>
                    </div>
                    <div class="text-center">
                        <button
                            type="submit"
                            class="btn bg-project-red hover:bg-red-700 text-white px-8 rounded-full">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
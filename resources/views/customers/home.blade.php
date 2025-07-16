@extends('customers.layouts.app')
@section('title', 'home - ID PROJECT')
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
                        {!! __('home.welcome_title') !!}
                    </h1>
                    <p class="text-xl mb-8 opacity-90">
                        {{ __('home.welcome_tagline') }}
                    </p>
                    <div class="flex gap-4">
                        <button
                            class="btn bg-red-500 text-white hover:bg-red-600 border-none px-8">
                            {{ __('home.get_started_btn') }}
                        </button>
                        <button
                            class="btn btn-outline border-white text-white hover:bg-white hover:text-black px-8">
                            {{ __('home.learn_more_btn') }}
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
                        {!! __('home.professional_services_title') !!}
                    </h1>
                    <p class="text-xl mb-8 opacity-90">
                        {{ __('home.professional_services_tagline') }}
                    </p>
                    <div class="flex gap-4">
                        <button
                            class="btn bg-red-500 text-white hover:bg-red-600 border-none px-8">
                            {{ __('home.our_services_btn') }}
                        </button>
                        <button
                            class="btn btn-outline border-white text-white hover:bg-white hover:text-black px-8">
                            {{ __('home.portfolio_btn') }}
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
                        {!! __('home.innovation_excellence_title') !!}
                    </h1>
                    <p class="text-xl mb-8 opacity-90">
                        {{ __('home.innovation_excellence_tagline') }}
                    </p>
                    <div class="flex gap-4">
                        <button
                            class="btn bg-red-500 text-white hover:bg-red-600 border-none px-8">
                            {{ __('home.contact_us_btn') }}
                        </button>
                        <button
                            class="btn btn-outline border-white text-white hover:bg-white hover:text-black px-8">
                            {{ __('home.about_us_btn') }}
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
                <h2 class="text-3xl font-bold mb-4">{{ __('home.about_us_heading') }}</h2>
                <p class="text-gray-700 mb-4">
                    {{ __('home.about_us_paragraph1') }}
                </p>
                <p class="text-gray-700 mb-4">
                    {!! __('home.about_us_paragraph2') !!}
                </p>
                <p class="text-gray-700">
                    {{ __('home.about_us_paragraph3') }}
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
                    <i class="bi bi-stars"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('home.projects_count_heading') }}</h3>
                    <p class="text-gray-700">
                        {{ __('home.projects_count_description') }}
                    </p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fas fa-comments"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('home.free_consultation_heading') }}</h3>
                    <p class="text-gray-700">
                        {{ __('home.free_consultation_description') }}
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fa-solid fa-truck"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('home.out_of_town_service_heading') }}</h3>
                    <p class="text-gray-700">
                        {{ __('home.out_of_town_service_description') }}
                    </p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('home.certified_operator_heading') }}</h3>
                    <p class="text-gray-700">
                        {{ __('home.certified_operator_description') }}
                    </p>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fa-solid fa-rocket"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('home.one_stop_service_heading') }}</h3>
                    <p class="text-gray-700">
                        {{ __('home.one_stop_service_description') }}
                    </p>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="flex items-start">
                <div class="bg-project-red rounded-full p-3 mr-4 text-white">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2">{{ __('home.contact_us_now_heading') }}</h3>
                    <p class="text-gray-700">
                        {{ __('home.contact_us_now_description') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">
            {{ __('home.services_heading') }}
        </h2>
        <p class="text-center text-gray-700 mb-12">
            {{ __('home.services_tagline') }}
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-home text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" class="hover:underline">{{ __('home.interior_exterior_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.interior_exterior_description') }}
                </p>
            </div>

            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-tools text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" class="hover:underline">{{ __('home.renovation_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.renovation_description') }}
                </p>
            </div>

            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-road text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" class="hover:underline">{{ __('home.civil_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.civil_description') }}
                </p>
            </div>

            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-tree text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" v class="hover:underline">{{ __('home.landscape_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.landscape_description') }}
                </p>
            </div>

            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-truck text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" class="hover:underline">{{ __('home.out_of_town_service_card_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.out_of_town_service_card_description') }}
                </p>
            </div>

            <!-- Service 6 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-building text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" class="hover:underline">{{ __('home.build_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.build_description') }}
                </p>
            </div>

            <!-- Service 7 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-wrench text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" class="hover:underline">{{ __('home.maintenance_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.maintenance_description') }}
                </p>
            </div>

            <!-- Service 8 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-pencil-ruler text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" class="hover:underline">{{ __('home.design_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.design_description') }}
                </p>
            </div>

            <!-- Service 9 -->
            <div
                class="service-card bg-white p-6 rounded-lg shadow-sm text-center">
                <div class="service-icon">
                    <i class="fas fa-bolt text-4xl text-gray-800"></i>
                </div>
                <h3 class="text-project-red font-bold mb-3">
                    <a class="nav-link {{ request()->routeIs('orderservice*') ? 'active' : '' }}"
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}" class="hover:underline">{{ __('home.elektrikal_heading') }}</a>
                </h3>
                <p class="text-gray-700 text-sm">
                    {{ __('home.elektrikal_description') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Appointment Form Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-project-red mb-12">
            {{ __('home.make_appointment_heading') }}
        </h2>

        <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <input
                                type="text"
                                placeholder="{{ __('home.full_name_placeholder') }}"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <input
                                type="email"
                                placeholder="{{ __('home.email_placeholder') }}"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <input
                                type="tel"
                                placeholder="{{ __('home.phone_whatsapp_placeholder') }}"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <textarea
                                placeholder="{{ __('home.notes_complaints_placeholder') }}"
                                class="textarea textarea-bordered w-full h-40"></textarea>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <input
                                type="date"
                                placeholder="{{ __('home.appointment_date_placeholder') }}"
                                class="input input-bordered w-full" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">
                                {{ __('home.operational_hours') }}
                            </p>
                            <p class="text-sm text-gray-600 mb-4">
                                {{ __('home.operational_hours_time') }}
                            </p>
                        </div>
                        <div>
                            <select class="select select-bordered w-full">
                                <option value="" disabled selected>
                                    {{ __('home.select_start_time_placeholder') }}
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
                            <p class="font-medium mb-3">{{ __('home.select_service_heading') }}</p>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.service_renovation') }}</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.service_civil') }}</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.service_landscape') }}</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.service_out_of_town') }}</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.service_build') }}</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.service_maintenance') }}</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.service_design') }}</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.service_elektrikal') }}</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <p class="font-medium mb-3">{{ __('home.select_method_heading') }}</p>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.method_online_discussion') }}</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error" />
                                    <span class="text-sm">{{ __('home.method_offline_discussion') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                class="checkbox checkbox-sm" />
                            <span class="text-sm">{{ __('home.not_a_robot_checkbox') }}</span>
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
                        {{ __('home.make_appointment_button') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="py-16 bg-white" x-data="projectSwitcher()">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2 judul">{{ __('home.our_projects_heading') }}</h2>
        <div class="flex justify-center mb-16">
            <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                <div class="w-10 h-2 bg-gray-800 rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row gap-12">
                <div class="w-full md:w-1/4">
                    <div class="space-y-6 relative">
                        <template x-for="(project, index) in projects" :key="index">
                            <div
                                @click="selected = index"
                                class="cursor-pointer transition-all duration-200"
                                :class="selected === index ? 'text-project-red font-semibold' : 'text-gray-800'"
                                x-text="project.name"
                            ></div>
                        </template>

                        <div class="absolute top-0 bottom-0 right-0 w-px bg-gray-300 hidden md:block"></div>
                    </div>
                </div>

                <div class="w-full md:w-3/4">
                    <div class="project-content" x-transition>
                        <h3 class="text-xl font-medium mb-6" x-text="projects[selected].title"></h3>
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="w-full md:w-3/5">
                                <p class="text-gray-700 mb-4" x-text="projects[selected].description1"></p>
                                <p class="text-gray-700 mb-4" x-text="projects[selected].description2"></p>
                                <p class="text-gray-700" x-text="projects[selected].description3"></p>
                            </div>
                            <div class="w-full md:w-2/5">
                                <img
                                    :src="projects[selected].image"
                                    :alt="projects[selected].title"
                                    class="w-full h-auto rounded-lg"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function projectSwitcher() {
        return {
            selected: 0,
            projects: [
                {
                    name: '{{ __("home.project_design_name") }}',
                    title: '{{ __("home.project_design_title") }}',
                    description1: '{{ __("home.project_design_desc1") }}',
                    description2: '{{ __("home.project_design_desc2") }}',
                    description3: '{{ __("home.project_design_desc3") }}',
                    image: 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1470',
                },
                {
                    name: '{{ __("home.project_build_name") }}',
                    title: '{{ __("home.project_build_title") }}',
                    description1: '{{ __("home.project_build_desc1") }}',
                    description2: '{{ __("home.project_build_desc2") }}',
                    description3: '{{ __("home.project_build_desc3") }}',
                    image: 'https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=1470',
                },
                {
                    name: '{{ __("home.project_renovation_name") }}',
                    title: '{{ __("home.project_renovation_title") }}',
                    description1: '{{ __("home.project_renovation_desc1") }}',
                    description2: '{{ __("home.project_renovation_desc2") }}',
                    description3: '{{ __("home.project_renovation_desc3") }}',
                    image: 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=1470',
                },
                {
                    name: '{{ __("home.project_interior_name") }}',
                    title: '{{ __("home.project_interior_title") }}',
                    description1: '{{ __("home.project_interior_desc1") }}',
                    description2: '{{ __("home.project_interior_desc2") }}',
                    description3: '{{ __("home.project_interior_desc3") }}',
                    image: 'https://images.unsplash.com/photo-1615874959474-d609969a1b90?q=80&w=1470',
                },
                {
                    name: '{{ __("home.project_exterior_name") }}',
                    title: '{{ __("home.project_exterior_title") }}',
                    description1: '{{ __("home.project_exterior_desc1") }}',
                    description2: '{{ __("home.project_exterior_desc2") }}',
                    description3: '{{ __("home.project_exterior_desc3") }}',
                    image: 'https://images.unsplash.com/photo-1618220179428-217d73e8f39b?q=80&w=1470',
                },
                {
                    name: '{{ __("home.project_landscape_name") }}',
                    title: '{{ __("home.project_landscape_title") }}',
                    description1: '{{ __("home.project_landscape_desc1") }}',
                    description2: '{{ __("home.project_landscape_desc2") }}',
                    description3: '{{ __("home.project_landscape_desc3") }}',
                    image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1470',
                },
                {
                    name: '{{ __("home.project_civil_name") }}',
                    title: '{{ __("home.project_civil_title") }}',
                    description1: '{{ __("home.project_civil_desc1") }}',
                    description2: '{{ __("home.project_civil_desc2") }}',
                    description3: '{{ __("home.project_civil_desc3") }}',
                    image: 'https://images.unsplash.com/photo-1597007633943-1b2b8d6e315d?q=80&w=1470',
                },
            ]
        }
    }
</script>


<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-start max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold mb-1">{{ __('home.testimonials_heading') }}</h2>
            <p class="text-gray-700 mb-8">{{ __('home.testimonials_tagline') }}</p>

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
                    {{ __('home.no_embeds_available') }}
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2 judul">{{ __('home.our_projects_heading') }}</h2>

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


<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2">{{ __('home.contact_us_heading_section') }}</h2>
        <div class="flex justify-center mb-4">
            <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                <div
                    class="w-10 h-2 bg-gray-800 rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
            </div>
        </div>
        <p class="text-center text-gray-700 mb-12">
            {{ __('home.contact_us_tagline_section') }}
        </p>

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
            <div class="w-full md:w-1/3">
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ __('home.location_heading') }}</h3>
                            <p class="text-gray-700">
                                {!! __('home.location_address') !!}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ __('home.phone_heading') }}</h3>
                            <p class="text-gray-700">
                                0778 - 2552963<br />
                                0812 - 7123 - 8443
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ __('home.email_heading') }}</h3>
                            <p class="text-gray-700">
                                id.project.official@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-2/3">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="name" placeholder="{{ __('home.your_name_placeholder') }}" class="input input-bordered w-full" required />
                        <input type="email" name="email" placeholder="{{ __('home.your_email_placeholder') }}" class="input input-bordered w-full" required />
                    </div>
                    <div class="mb-4">
                        <input type="text" name="subject" placeholder="{{ __('home.subject_placeholder') }}" class="input input-bordered w-full" required />
                    </div>
                    <div class="mb-6">
                        <textarea name="message" placeholder="{{ __('home.message_placeholder') }}" class="textarea textarea-bordered w-full h-40" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-project-red hover:bg-red-700 text-white px-8 rounded-full">
                            {{ __('home.send_message_button') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
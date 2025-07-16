@extends('customers.layouts.app')
@section('title', 'About Us - ID PROJECT')
@section('content')
<div
    class="hero-section-100 py-20"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('assets/wallpaperflare-cropped2.jpg') }}');"
>
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4 text-white">{!! __('about.hero_title') !!}</h1>
            <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
            <p class="text-lg text-white">
                {{ __('about.hero_tagline') }}
            </p>
        </div>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="w-full md:w-1/2">
                <img
                    src="{{ asset('assets/wallpaperflare_wallpaper.jpg') }}"
                    alt="About ID PROJECT"
                    class="rounded-tl-3xl rounded-br-3xl rounded-tr-none rounded-bl-none shadow-lg w-full" />
            </div>
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold mb-4">{{ __('about.our_story_heading') }}</h2>
                <p class="text-gray-700 mb-4">
                    {{ __('about.our_story_paragraph1') }}
                </p>
                <p class="text-gray-700 mb-4">
                    {!! __('about.our_story_paragraph2') !!}
                </p>
                <p class="text-gray-700">
                    {!! __('about.our_story_paragraph3') !!}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">{{ __('about.our_values_heading') }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div
                    class="bg-project-red text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-medal text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">{{ __('about.quality_heading') }}</h3>
                <p class="text-gray-700">
                    {{ __('about.quality_description') }}
                </p>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div
                    class="bg-project-red text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">{{ __('about.integrity_heading') }}</h3>
                <p class="text-gray-700">
                    {{ __('about.integrity_description') }}
                </p>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div
                    class="bg-project-red text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">{{ __('about.innovation_heading') }}</h3>
                <p class="text-gray-700">
                    {{ __('about.innovation_description') }}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-6">{{ __('about.our_vision_heading') }}</h2>
            <p class="text-gray-700 text-lg" style="color: #e74c3c; font-size: 3.5rem; font-weight: normal; line-height: 1.2;">
                {{ __('about.our_vision_text') }}
            </p>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-10">{{ __('about.our_mission_heading') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col">
                    <div class="relative mb-4">
                        <div
                            class="bg-project-red text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mb-4 z-10">
                            1
                        </div>
                        <div
                            class="bg-gray-800 bg-opacity-70 p-6 pt-10 -mt-8 rounded-lg">
                            <p class="text-white">
                                {{ __('about.mission1_description') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="relative mb-4">
                        <div
                            class="bg-project-red text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mb-4 z-10">
                            2
                        </div>
                        <div
                            class="bg-gray-800 bg-opacity-70 p-6 pt-10 -mt-8 rounded-lg">
                            <p class="text-white">
                                {{ __('about.mission2_description') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="relative mb-4">
                        <div
                            class="bg-project-red text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mb-4 z-10">
                            3
                        </div>
                        <div
                            class="bg-gray-800 bg-opacity-70 p-6 pt-10 -mt-8 rounded-lg">
                            <p class="text-white">
                                {{ __('about.mission3_description') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-3xl font-bold text-center mb-6">
                {{ __('about.reasons_heading') }}
            </h2>
            <div class="flex justify-center mb-8">
                <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                    <div
                        class="w-10 h-2 bg-project-red rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
                </div>
            </div>
            <p class="text-center text-gray-700 mb-10">
                {{ __('about.reasons_tagline') }}
            </p>

            <div class="max-w-4xl mx-auto">
                <div
                    class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                    <div
                        class="flex items-center justify-between bg-white p-4 cursor-pointer"
                        onclick="toggleReason('reason1')">
                        <div class="flex items-center">
                            <div class="text-project-red mr-4">
                                <i
                                    class="fas fa-hand-holding-heart text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-project-red">
                                {{ __('about.free_survey_heading') }}
                            </h3>
                        </div>
                        <div class="text-project-red">
                            <i
                                class="fas fa-chevron-down"
                                id="reason1-icon"></i>
                        </div>
                    </div>
                    <div
                        class="bg-project-red text-white p-6 hidden"
                        id="reason1-content">
                        <p>
                            {{ __('about.free_survey_description') }}
                        </p>
                    </div>
                </div>

                <div
                    class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                    <div
                        class="flex items-center justify-between bg-white p-4 cursor-pointer"
                        onclick="toggleReason('reason2')">
                        <div class="flex items-center">
                            <div class="text-project-red mr-4">
                                <i class="fas fa-comments text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-project-red">
                                {{ __('about.free_consultation_heading_2') }}
                            </h3>
                        </div>
                        <div class="text-project-red">
                            <i
                                class="fas fa-chevron-down"
                                id="reason2-icon"></i>
                        </div>
                    </div>
                    <div
                        class="bg-project-red text-white p-6 hidden"
                        id="reason2-content">
                        <p>
                            {{ __('about.free_consultation_description_2') }}
                        </p>
                    </div>
                </div>

                <div
                    class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                    <div
                        class="flex items-center justify-between bg-white p-4 cursor-pointer"
                        onclick="toggleReason('reason3')">
                        <div class="flex items-center">
                            <div class="text-project-red mr-4">
                                <i class="fas fa-heart text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-project-red">
                                {{ __('about.serve_with_love_heading') }}
                            </h3>
                        </div>
                        <div class="text-project-red">
                            <i
                                class="fas fa-chevron-down"
                                id="reason3-icon"></i>
                        </div>
                    </div>
                    <div
                        class="bg-project-red text-white p-6 hidden"
                        id="reason3-content">
                        <p>
                            {{ __('about.serve_with_love_description') }}
                        </p>
                    </div>
                </div>

                <div
                    class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                    <div
                        class="flex items-center justify-between bg-white p-4 cursor-pointer"
                        onclick="toggleReason('reason4')">
                        <div class="flex items-center">
                            <div class="text-project-red mr-4">
                                <i class="fas fa-user-check text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-project-red">
                                {{ __('about.operator_certified_heading_2') }}
                            </h3>
                        </div>
                        <div class="text-project-red">
                            <i
                                class="fas fa-chevron-down"
                                id="reason4-icon"></i>
                        </div>
                    </div>
                    <div
                        class="bg-project-red text-white p-6 hidden"
                        id="reason4-content">
                        <p>
                            {{ __('about.operator_certified_description_2') }}
                        </p>
                    </div>
                </div>

                <div
                    class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                    <div
                        class="flex items-center justify-between bg-white p-4 cursor-pointer"
                        onclick="toggleReason('reason5')">
                        <div class="flex items-center">
                            <div class="text-project-red mr-4">
                                <i class="fas fa-headset text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-project-red">
                                {{ __('about.after_sales_service_heading') }}
                            </h3>
                        </div>
                        <div class="text-project-red">
                            <i
                                class="fas fa-chevron-down"
                                id="reason5-icon"></i>
                        </div>
                    </div>
                    <div
                        class="bg-project-red text-white p-6 hidden"
                        id="reason5-content">
                        <p>
                            {{ __('about.after_sales_service_description') }}
                        </p>
                    </div>
                </div>

                <div
                    class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                    <div
                        class="flex items-center justify-between bg-white p-4 cursor-pointer"
                        onclick="toggleReason('reason6')">
                        <div class="flex items-center">
                            <div class="text-project-red mr-4">
                                <i class="fas fa-shield-alt text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-project-red">
                                {{ __('about.warranty_heading') }}
                            </h3>
                        </div>
                        <div class="text-project-red">
                            <i
                                class="fas fa-chevron-down"
                                id="reason6-icon"></i>
                        </div>
                    </div>
                    <div
                        class="bg-project-red text-white p-6 hidden"
                        id="reason6-content">
                        <p>
                            {{ __('about.warranty_description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleReason(id) {
            const content = document.getElementById(id + "-content");
            const icon = document.getElementById(id + "-icon");

            if (content.classList.contains("hidden")) {
                content.classList.remove("hidden");
                icon.classList.remove("fa-chevron-down");
                icon.classList.add("fa-chevron-up");
            } else {
                content.classList.add("hidden");
                icon.classList.remove("fa-chevron-up");
                icon.classList.add("fa-chevron-down");
            }
        }
    </script>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2">{{ __('about.our_team_heading') }}</h2>
        <div class="flex justify-center mb-16">
            <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                <div
                    class="w-10 h-2 bg-gray-800 rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div
                    class="relative mb-4 mx-auto w-48 h-48 rounded-full overflow-hidden">
                    <img
                        src="{{ asset('assets/man.png') }}"
                        alt="Team Member"
                        class="w-full h-full object-cover" />
                </div>
                <h3 class="text-xl font-bold">{{ __('about.john_doe_name') }}</h3>
                <p class="text-project-red font-medium">{{ __('about.john_doe_title') }}</p>
                <p class="text-gray-700 mt-2">
                    {{ __('about.john_doe_description') }}
                </p>
                <div class="flex justify-center mt-4 space-x-3">
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="text-center">
                <div
                    class="relative mb-4 mx-auto w-48 h-48 rounded-full overflow-hidden">
                    <img
                        src="{{ asset('assets/woman.png') }}"
                        alt="Team Member"
                        class="w-full h-full object-cover" />
                </div>
                <h3 class="text-xl font-bold">{{ __('about.jane_smith_name') }}</h3>
                <p class="text-project-red font-medium">{{ __('about.jane_smith_title') }}</p>
                <p class="text-gray-700 mt-2">
                    {{ __('about.jane_smith_description') }}
                </p>
                <div class="flex justify-center mt-4 space-x-3">
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="text-center">
                <div
                    class="relative mb-4 mx-auto w-48 h-48 rounded-full overflow-hidden">
                    <img
                        src="{{ asset('assets/man.png') }}"
                        alt="Team Member"
                        class="w-full h-full object-cover" />
                </div>
                <h3 class="text-xl font-bold">{{ __('about.john_doe_name') }}</h3> {{-- Assuming placeholder for another male --}}
                <p class="text-project-red font-medium">{{ __('about.john_doe_title') }}</p>
                <p class="text-gray-700 mt-2">
                    {{ __('about.john_doe_description') }}
                </p>
                <div class="flex justify-center mt-4 space-x-3">
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="text-center">
                <div
                    class="relative mb-4 mx-auto w-48 h-48 rounded-full overflow-hidden">
                    <img
                        src="{{ asset('assets/man.png') }}"
                        alt="Team Member"
                        class="w-full h-full object-cover" />
                </div>
                <h3 class="text-xl font-bold">{{ __('about.michael_johnson_name') }}</h3>
                <p class="text-project-red font-medium">{{ __('about.michael_johnson_title') }}</p>
                <p class="text-gray-700 mt-2">
                    {{ __('about.michael_johnson_description') }}
                </p>
                <div class="flex justify-center mt-4 space-x-3">
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-600 hover:text-project-red"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4">{{ __('about.our_coverage_heading') }}</h2>
        <div class="flex justify-center mb-8">
            <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                <div
                    class="w-10 h-2 bg-project-red rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
            </div>
        </div>
        <p class="text-center text-gray-700 mb-12">
            {{ __('about.our_coverage_tagline') }}
        </p>

        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="w-full md:w-3/5">
                <img
                    src="{{ asset('assets/images/image 15.png') }}"
                    alt="Peta Jangkauan ID Project"
                    class="w-full h-auto rounded-lg shadow-md" />
            </div>

            <div class="w-full md:w-2/5">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4">
                        {{ __('about.cities_heading') }}
                    </h3>
                    <ol class="list-decimal pl-5 space-y-2">
                        <li>{{ __('about.city_batam') }}</li>
                        <li>{{ __('about.city_pekanbaru') }}</li>
                        <li>{{ __('about.city_jakarta') }}</li>
                        <li>{{ __('about.city_yogyakarta') }}</li>
                        <li>{{ __('about.city_surabaya') }}</li>
                        <li>{{ __('about.city_bali') }}</li>
                        <li>{{ __('about.city_kalimantan') }}</li>
                        <li>{{ __('about.city_makassar') }}</li>
                        <li>{{ __('about.city_papua') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4 text-project-red">
            {{ __('about.our_partners_heading') }}
        </h2>
        <div class="flex justify-center mb-12">
            <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                <div
                    class="w-10 h-2 bg-project-red rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto">
            <div
                class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-8 mb-12">
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/alderon.png') }}"
                        alt="Alderon"
                        class="h-24 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/bardi.png') }}"
                        alt="Bardi"
                        class="h-24 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/philips.png') }}"
                        alt="Philips"
                        class="h-24 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/mitra 10.png') }}"
                        alt="Mitrato"
                        class="h-24 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/nippon paint.png') }}"
                        alt="Nippon Paint"
                        class="h-24 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/dulux.png') }}"
                        alt="Dulux"
                        class="h-16 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/visalux.png') }}"
                        alt="Visalux"
                        class="h-16 object-contain" />
                </div>
            </div>

            <div
                class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-8 mb-12">
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/mowilex.png') }}"
                        alt="Mowilex"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/volex.png') }}"
                        alt="Volex"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/modena.png') }}"
                        alt="Modena"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/jotun.png') }}"
                        alt="Jotun"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/rucika.png') }}"
                        alt="Rucika"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/shundaplafon.png') }}"
                        alt="Shunda Plafon PVC"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/taco.png') }}"
                        alt="Taco"
                        class="h-12 object-contain" />
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-16 mb-12">
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/jinawi.png') }}"
                        alt="Jinawi"
                        class="h-16 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/onna.png') }}"
                        alt="Onka"
                        class="h-24 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/informa.png') }}"
                        alt="Informa"
                        class="h-24 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/indocement.png') }}"
                        alt="Indocement"
                        class="h-24 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300 w-[280px] h-[80px] -translate-x-20 translate-y-6">
                    <img
                        src="{{ asset('assets/images/mytripidn.png') }}"
                        alt="Mytrip Indonesia"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300 w-[229px] h-[80px] translate-y-6">
                    <img
                        src="{{ asset('assets/images/wisco gallery.png') }}"
                        alt="Wisco Gallery"
                        class="h-12 object-contain" />
                </div>
            </div>
            {{-- This row has fewer items, so the grid might not fill evenly. You might need to adjust grid-cols or add empty divs if visual balance is critical. --}}
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-8">
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/mokko.png') }}"
                        alt="Mokko"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/selma.png') }}"
                        alt="Selma"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/inovar.png') }}"
                        alt="Inovar"
                        class="h-12 object-contain" />
                </div>
                <div
                    class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all duration-300">
                    <img
                        src="{{ asset('assets/images/semen bosowa.png') }}"
                        alt="BSW"
                        class="h-12 object-contain" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-2">{{ __('about.contact_heading_section') }}</h2>
        <div class="flex justify-center mb-4">
            <div class="w-40 h-2 bg-gray-200 rounded-full relative">
                <div
                    class="w-10 h-2 bg-gray-800 rounded-full absolute left-1/2 transform -translate-x-1/2"></div>
            </div>
        </div>
        <p class="text-center text-gray-700 mb-12">
            {{ __('about.contact_tagline_section') }}
        </p>

        <div class="w-full h-96 bg-gray-300 mb-12 rounded-lg overflow-hidden">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.5744113084522!2d104.00204025653267!3d1.049643199733973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98d54d7caf241%3A0xa361b2e811a92d7a!2sid.project!5e0!3m2!1sid!2sid!4v1745357954729!5m2!1sid!2sid"
                width="100%"
                height="100%"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-1/2">
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ __('about.contact_location_heading') }}</h3>
                            <p class="text-gray-700">
                                {!! __('about.contact_location_address') !!}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ __('about.contact_phone_heading') }}</h3>
                            <p class="text-gray-700">
                                0778 - 3852963<br />
                                0895 - 3149 - 8443
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ __('about.contact_email_heading') }}</h3>
                            <p class="text-gray-700">
                                i.d.project.official01@gmail.com
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="text-3xl text-gray-800 mr-4">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2">{{ __('about.contact_follow_us_heading') }}</h3>
                            <div class="flex space-x-4">
                                <a
                                    href="https://www.facebook.com/apriliane.fress"
                                    class="text-gray-800 hover:text-project-red">
                                    <i class="fab fa-facebook-f text-xl"></i>
                                </a>
                                <a
                                    href="https://www.youtube.com/@ID.PROJECTOFFICIAL"
                                    class="text-gray-800 hover:text-project-red">
                                    <i class="fab fa-youtube text-xl"></i>
                                </a>
                                <a
                                    href="https://www.instagram.com/id.project.official"
                                    class="text-gray-800 hover:text-project-red">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                                <a
                                    href="https://www.tiktok.com/@id.project.official"
                                    class="text-gray-800 hover:text-project-red">
                                    <i class="fab fa-tiktok text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <blockquote
                class="instagram-media"
                data-instgrm-permalink="https://www.instagram.com/p/CnTBOyYB6Gv/?utm_source=ig_web_copy_link"
                data-instgrm-version="12"
                style="
                    background: #fff;
                    border: 0;
                    border-radius: 3px;
                    box-shadow: 0 0 1px 0 rgba(0, 0, 0, 0.5),
                        0 1px 10px 0 rgba(0, 0, 0, 0.15);
                    margin: 1px;
                    max-width: 540px;
                    min-width: 326px;
                    padding: 0;
                    width: 99.375%;
                    width: undefinedpx;
                    height: undefinedpx;
                    max-height: 100%;
                    width: undefinedpx;
                ">
                <div style="padding: 16px">
                    <a
                        id="main_link"
                        href="reel/DI8AL_Czyrk/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="
                        style="
                            background: #ffffff;
                            line-height: 0;
                            padding: 0 0;
                            text-align: center;
                            text-decoration: none;
                            width: 100%;
                        "
                        target="_blank">
                        <div
                            style="
                                display: flex;
                                flex-direction: row;
                                align-items: center;
                            ">
                            <div
                                style="
                                    background-color: #f4f4f4;
                                    border-radius: 50%;
                                    flex-grow: 0;
                                    height: 40px;
                                    margin-right: 14px;
                                    width: 40px;
                                "></div>
                            <div
                                style="
                                    display: flex;
                                    flex-direction: column;
                                    flex-grow: 1;
                                    justify-content: center;
                                ">
                                <div
                                    style="
                                        background-color: #f4f4f4;
                                        border-radius: 4px;
                                        flex-grow: 0;
                                        height: 14px;
                                        margin-bottom: 6px;
                                        width: 100px;
                                    "></div>
                                <div
                                    style="
                                        background-color: #f4f4f4;
                                        border-radius: 4px;
                                        flex-grow: 0;
                                        height: 14px;
                                        width: 60px;
                                    "></div>
                            </div>
                        </div>
                        <div style="padding: 19% 0"></div>
                        <div
                            style="
                                display: block;
                                height: 50px;
                                margin: 0 auto 12px;
                                width: 50px;
                            ">
                            <svg
                                width="50px"
                                height="50px"
                                viewBox="0 0 60 60"
                                version="1.1"
                                xmlns="https://www.w3.org/2000/svg"
                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                <g
                                    stroke="none"
                                    stroke-width="1"
                                    fill="none"
                                    fill-rule="evenodd">
                                    <g
                                        transform="translate(-511.000000, -20.000000)"
                                        fill="#000000">
                                        <g>
                                            <path
                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div style="padding-top: 8px">
                            <div
                                style="
                                    color: #3897f0;
                                    font-family: Arial, sans-serif;
                                    font-size: 14px;
                                    font-style: normal;
                                    font-weight: 550;
                                    line-height: 18px;
                                ">
                                View this post on Instagram
                            </div>
                        </div>
                        <div style="padding: 12.5% 0"></div>
                        <div
                            style="
                                display: flex;
                                flex-direction: row;
                                margin-bottom: 14px;
                                align-items: center;
                            ">
                            <div>
                                <div
                                    style="
                                        background-color: #f4f4f4;
                                        border-radius: 50%;
                                        height: 12.5px;
                                        width: 12.5px;
                                        transform: translateX(0px)
                                            translateY(7px);
                                    "></div>
                                <div
                                    style="
                                        background-color: #f4f4f4;
                                        height: 12.5px;
                                        transform: rotate(-45deg)
                                            translateX(3px) translateY(1px);
                                        width: 12.5px;
                                        flex-grow: 0;
                                        margin-right: 14px;
                                        margin-left: 2px;
                                    "></div>
                                <div
                                    style="
                                        background-color: #f4f4f4;
                                        border-radius: 50%;
                                        height: 12.5px;
                                        width: 12.5px;
                                        transform: translateX(9px)
                                            translateY(-18px);
                                    "></div>
                            </div>
                            <div style="margin-left: 8px">
                                <div
                                    style="
                                        background-color: #f4f4f4;
                                        border-radius: 50%;
                                        flex-grow: 0;
                                        height: 20px;
                                        width: 20px;
                                    "></div>
                                <div
                                    style="
                                        width: 0;
                                        height: 0;
                                        border-top: 2px solid transparent;
                                        border-left: 6px solid #f4f4f4;
                                        border-bottom: 2px solid transparent;
                                        transform: translateX(16px)
                                            translateY(-4px) rotate(30deg);
                                    "></div>
                            </div>
                            <div style="margin-left: auto">
                                <div
                                    style="
                                        width: 0px;
                                        border-top: 8px solid #f4f4f4;
                                        border-right: 8px solid transparent;
                                        transform: translateY(16px);
                                    "></div>
                                <div
                                    style="
                                        background-color: #f4f4f4;
                                        flex-grow: 0;
                                        height: 12px;
                                        width: 16px;
                                        transform: translateY(-4px);
                                    "></div>
                                <div
                                    style="
                                        width: 0;
                                        height: 0;
                                        border-top: 8px solid #f4f4f4;
                                        border-left: 8px solid transparent;
                                        transform: translateY(-4px)
                                            translateX(8px);
                                    "></div>
                            </div>
                        </div>
                        <div
                            style="
                                display: flex;
                                flex-direction: column;
                                flex-grow: 1;
                                justify-content: center;
                                margin-bottom: 24px;
                            ">
                            <div
                                style="
                                    background-color: #f4f4f4;
                                    border-radius: 4px;
                                    flex-grow: 0;
                                    height: 14px;
                                    margin-bottom: 6px;
                                    width: 224px;
                                "></div>
                            <div
                                style="
                                    background-color: #f4f4f4;
                                    border-radius: 4px;
                                    flex-grow: 0;
                                    height: 14px;
                                    width: 144px;
                                "></div>
                        </div>
                    </a>
                    <p
                        style="
                            color: #c9c8cd;
                            font-family: Arial, sans-serif;
                            font-size: 14px;
                            line-height: 17px;
                            margin-bottom: 0;
                            margin-top: 8px;
                            overflow: hidden;
                            padding: 8px 0 7px;
                            text-align: center;
                            text-overflow: ellipsis;
                            white-space: nowrap;
                        ">
                        <a
                            href="reel/DI8AL_Czyrk/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="
                            style="
                                color: #c9c8cd;
                                font-family: Arial, sans-serif;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: normal;
                                line-height: 17px;
                                text-decoration: none;
                            "
                            target="_blank">Shared post</a>
                        on
                        <time
                            style="
                                font-family: Arial, sans-serif;
                                font-size: 14px;
                                line-height: 17px;
                            ">Time</time>
                    </p>
                </div>
            </blockquote>
            <script src="https://www.instagram.com/embed.js"></script>
            <script
                type="text/javascript"
                src="https://www.embedista.com/j/instagramfeed1707.js"></script>
            <div
                style="
                    overflow: auto;
                    position: absolute;
                    height: 0pt;
                    width: 0pt;
                ">
                <a href="https://www.embedista.com/instagramfeed">Embed Instagram Post</a>
                Code Generator
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">
                {{ __('about.cta_heading') }}
            </h2>
            <p class="text-lg mb-8">
                {{ __('about.cta_tagline') }}
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a
                    href="{{ auth()->check() ? route('orderservice.form') : route('login') }}"
                    class="btn bg-project-red hover:bg-red-700 text-white px-8 py-3 rounded-full">{{ __('about.cta_contact_button') }}</a>

            </div>
        </div>
    </div>
</section>
@endsection
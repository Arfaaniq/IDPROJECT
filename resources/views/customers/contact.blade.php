@extends('customers.layouts.app')

@section('title', 'Contact Us - ID PROJECT')

@section('content')
    <div
        class="hero-section-100 py-20"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{
            asset('assets/wallpaperflare-cropped2.jpg')
        }}');"
    >
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4 text-white">{{ __('contact.hero_title') }}</h1>
                <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
                <p class="text-lg text-white">
                    {{ __('contact.hero_tagline') }}
                </p>
            </div>
        </div>
    </div>

    <section class="relative">
        <div class="w-full h-[400px]">
            <iframe
                src="http://maps.google.com/maps?q=Town%20House%20Buana%20Central%20Park,%20Blok%20Lexington%20No.%20112%20B,%20Kota%20Batam,%20Kep.%20Riau&z=15&output=embed"
                width="100%"
                height="100%"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>

        <div
            class="absolute top-0 right-0 bottom-0 w-full md:w-1/3 bg-gray-800 bg-opacity-80 text-white p-8"
        >
            <div class="space-y-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-4">
                        <div
                            class="w-10 h-10 rounded-full bg-white flex items-center justify-center"
                        >
                            <i class="fas fa-map-marker-alt text-gray-800"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-1">{{ __('contact.location_heading') }}</h3>
                        <p class="text-gray-200">
                            {!! __('contact.location_address') !!}
                        </p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-4">
                        <div
                            class="w-10 h-10 rounded-full bg-white flex items-center justify-center"
                        >
                            <i class="fas fa-phone-alt text-gray-800"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-1">{{ __('contact.phone_heading') }}</h3>
                        <p class="text-gray-200">
                            0778 - 3852963<br />
                            0895 - 3149 - 8443
                        </p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-4">
                        <div
                            class="w-10 h-10 rounded-full bg-white flex items-center justify-center"
                        >
                            <i class="fas fa-envelope text-gray-800"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-1">{{ __('contact.email_heading') }}</h3>
                        <p class="text-gray-200">i.d.project.official01@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-project-red mb-12">
                {{ __('contact.form_heading') }}
            </h2>
            {{-- ALERT SUCCESS & ERROR VALIDATION --}}
            <div class="max-w-4xl mx-auto mb-6 flex flex-col gap-3">
                @if (session('success'))
                    <div
                        class="flex items-center rounded-b border-t-2 border-green-500 bg-white px-6 py-4 text-sm shadow-sm dark:bg-gray-900"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8 stroke-current text-green-500"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>
                        <div class="ml-3">
                            <div class="text-left font-bold text-black dark:text-gray-50">
                                {{ __('contact.success_alert_title') }}
                            </div>
                            <div class="mt-1 w-full text-gray-900 dark:text-gray-300">
                                {{ __('contact.success_alert_message') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div
                        class="flex items-start rounded-b border-t-2 border-red-500 bg-white px-6 py-4 text-sm shadow-sm dark:bg-gray-900"
                    >
                        <svg
                            viewBox="0 0 24 24"
                            class="h-8 w-8 stroke-current text-red-500"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M12 8V12V8ZM12 16H12.01H12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        <div class="ml-3">
                            <div class="text-left font-bold text-black dark:text-gray-50">
                                {{ __('contact.error_alert_title') }}
                            </div>
                            <ul class="list-inside list-disc text-gray-900 dark:text-gray-300 mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                @if ($errors->has('gambar'))
                                    <li>{{ __('contact.image_upload_hint') }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <div class="max-w-5xl mx-auto rounded-lg bg-white p-8 shadow-md">
                <form
                    action="{{ route('orderservice') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="space-y-6">
                            <div>
                                <label for="nama_lengkap" class="sr-only">{{ __('contact.full_name_placeholder') }}</label>
                                <input
                                    type="text"
                                    id="nama_lengkap"
                                    placeholder="{{ __('contact.full_name_placeholder') }}"
                                    class="input input-bordered w-full @error('nama_lengkap') is-invalid @enderror"
                                    name="nama_lengkap"
                                    value="{{ old('nama_lengkap', Auth::check() ? Auth::user()->name : '') }}"
                                />
                                @error('nama_lengkap')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="sr-only">{{ __('contact.email_placeholder') }}</label>
                                <input
                                    type="email"
                                    id="email"
                                    placeholder="{{ __('contact.email_placeholder') }}"
                                    name="email"
                                    class="input input-bordered w-full @error('email') is-invalid @enderror"
                                    value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}"
                                    {{ Auth::check() ? 'readonly' : 'required' }}
                                />
                                @error('email')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="no_hp" class="sr-only">{{ __('contact.phone_whatsapp_placeholder') }}</label>
                                <input
                                    type="tel"
                                    id="no_hp"
                                    placeholder="{{ __('contact.phone_whatsapp_placeholder') }}"
                                    name="no_hp"
                                    class="input input-bordered w-full @error('no_hp') is-invalid @enderror"
                                    value="{{ old('no_hp') }}"
                                    required
                                />
                                @error('no_hp')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="catatan" class="sr-only">{{ __('contact.notes_complaints_placeholder') }}</label>
                                <textarea
                                    id="catatan"
                                    placeholder="{{ __('contact.notes_complaints_placeholder') }}"
                                    name="catatan"
                                    class="textarea textarea-bordered w-full h-40 @error('catatan') is-invalid @enderror"
                                >{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label for="tanggal_temu" class="sr-only">{{ __('contact.appointment_date_placeholder') }}</label>
                                <div class="relative">
                                    <input
                                        type="date"
                                        id="tanggal_temu"
                                        name="tanggal_temu"
                                        class="input input-bordered w-full pr-10"
                                        value="{{ old('tanggal_temu') }}"
                                    />
                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                @error('tanggal_temu')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">{{ __('contact.operational_hours_label') }}:</p>
                                <p class="text-sm text-gray-600 mb-4">
                                    {{ __('contact.operational_hours_time') }}
                                </p>
                            </div>
                            <div>
                                <label for="jam_temu" class="sr-only">{{ __('contact.appointment_time_placeholder') }}</label>
                                <div class="relative">
                                    <input
                                        type="time"
                                        id="jam_temu"
                                        name="jam_temu"
                                        class="input input-bordered w-full pr-10 @error('jam_temu') is-invalid @enderror"
                                        value="{{ old('jam_temu') }}"
                                    />
                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                                        <i class="far fa-clock"></i>
                                    </span>
                                </div>
                                @error('jam_temu')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Pilih Layanan Checkboxes --}}
                            <div>
                                <p class="font-medium mb-3">{{ __('contact.select_service_label') }}</p>
                                <div class="grid grid-cols-2 gap-3">
                                    @php
                                        // Use localization keys as values for consistency and clarity
                                        $serviceOptions = [
                                            'service_design_house',
                                            'service_renovation_building',
                                            'service_civil',
                                            'service_development',
                                            'service_interior_exterior',
                                            'service_repair',
                                            'service_landscape',
                                            'service_out_of_town',
                                            'service_electrical',
                                        ];
                                    @endphp

                                    @foreach($serviceOptions as $serviceKey)
                                        <label class="flex items-center gap-2">
                                            <input
                                                type="checkbox"
                                                class="checkbox checkbox-sm checkbox-error"
                                                name="layanan[]"
                                                value="{{ $serviceKey }}" {{-- Store the key in the value --}}
                                                onchange="limitCheckboxSelection(this, 3)"
                                                {{ in_array($serviceKey, old('layanan', [])) ? 'checked' : '' }}
                                            />
                                            <span class="text-sm">{{ __('contact.' . $serviceKey) }}</span> {{-- Display the translated text --}}
                                        </label>
                                    @endforeach
                                </div>
                                @error('layanan')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Upload Gambar --}}
                            <div>
                                <p class="font-medium mb-3">{{ __('contact.upload_image_label') }}</p>
                                <input
                                    type="file"
                                    name="gambar[]"
                                    class="file-input file-input-bordered file-input-error w-full @error('gambar.*') is-invalid @enderror"
                                    multiple
                                />

                                @error('gambar.*')
                                    <div class="invalid-feedback text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                                @if ($errors->has('gambar')) {{-- This specific error for file size/type will be caught by generic $errors->all() but this provides specific message --}}
                                    <small class="text-danger mt-1 block">
                                        {{ __('contact.image_upload_hint') }}
                                    </small>
                                @endif
                            </div>

                            {{-- reCAPTCHA Checkbox and Pesan Button --}}
                            <div class="flex items-center justify-between gap-4">
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm @error('captcha') is-invalid @enderror"
                                        name="captcha"
                                        required
                                    />
                                    <span class="form-check-label">{{ __('contact.not_a_robot_checkbox_label') }}</span>
                                    <img
                                        src="https://www.gstatic.com/recaptcha/api2/logo_48.png"
                                        alt="reCAPTCHA"
                                        class="h-8"
                                    />
                                </label>
                                @error('captcha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <button
                                    type="submit"
                                    class="btn btn-error text-white px-12 rounded-full"
                                >
                                    {{ __('contact.submit_button') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function limitCheckboxSelection(checkbox, maxAllowed) {
            let checkboxes = document.querySelectorAll('input[name="layanan[]"]:checked');
            if (checkboxes.length > maxAllowed) {
                // Use localization for the alert message
                alert("{{ __('contact.max_services_alert', ['maxAllowed' => 'MAX_PLACEHOLDER']) }}".replace('MAX_PLACEHOLDER', maxAllowed));
                checkbox.checked = false; // Batalkan centang pada kotak yang baru saja dipilih
            }
        }

        // Add pre-selection for checkboxes based on old('layanan', [])
        document.addEventListener('DOMContentLoaded', function() {
            const oldLayanan = @json(old('layanan', []));
            const checkboxes = document.querySelectorAll('input[name="layanan[]"]');
            checkboxes.forEach(checkbox => {
                if (oldLayanan.includes(checkbox.value)) {
                    checkbox.checked = true;
                }
            });
        });
    </script>
@endsection
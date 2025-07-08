@extends('customers.layouts.app') @section('title', 'Contact Us - ID PROJECT')
@section('content')

Hero Section for About Page 
<div class="hero-section-100 py-20 hero-with-bg">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4 text-white">Contact ID PROJECT</h1>
            <div class="w-24 h-1 bg-project-red mx-auto mb-8"></div>
            <p class="text-lg text-white">
                    Learn more about our company, our mission, and our dedicated team of professionals.
                </p>
        </div>
    </div>
</div>

<!-- Contact Map Section -->
<section class="relative">
    <!-- Map -->
    <div class="w-full h-[400px]">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.5744113084522!2d104.00204025653267!3d1.049643199733973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98d54d7caf241%3A0xa361b2e811a92d7a!2sid.project!5e0!3m2!1sid!2sid!4v1745357954729!5m2!1sid!2sid"
            width="100%"
            height="100%"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
        >
        </iframe>
    </div>

    <!-- Contact Info Overlay -->
    <div class="absolute top-0 right-0 bottom-0 w-full md:w-1/3 bg-gray-800 bg-opacity-80 text-white p-8">
            <!-- style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{
            asset('assets/wallpaperflare-cropped2.jpg')
        }}'); background-size: cover; background-position: center;" -->
        <div class="space-y-8">
            <!-- Location -->
            <div class="flex items-start">
                <div class="flex-shrink-0 mr-4">
                    <div
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center"
                    >
                        <i class="fas fa-map-marker-alt text-gray-800"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-1">Location</h3>
                    <p class="text-gray-200">
                        Town House Buana Central Park<br />
                        Blok Lexington No. 112 B, Kota Batam, Kep. Riau.
                    </p>
                </div>
            </div>

            <!-- Phone -->
            <div class="flex items-start">
                <div class="flex-shrink-0 mr-4">
                    <div
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center"
                    >
                        <i class="fas fa-phone-alt text-gray-800"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-1">Phone</h3>
                    <p class="text-gray-200">
                        0778 - 3852963<br />
                        0895 - 3149 - 8443
                    </p>
                </div>
            </div>

            <!-- Email -->
            <div class="flex items-start">
                <div class="flex-shrink-0 mr-4">
                    <div
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center"
                    >
                        <i class="fas fa-envelope text-gray-800"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-1">Email</h3>
                    <p class="text-gray-200">
                        i.d.project.official01@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

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
                                class="input input-bordered w-full"
                            />
                        </div>
                        <div>
                            <input
                                type="email"
                                placeholder="Email"
                                class="input input-bordered w-full"
                            />
                        </div>
                        <div>
                            <input
                                type="tel"
                                placeholder="No. Handphone/WA"
                                class="input input-bordered w-full"
                            />
                        </div>
                        <div>
                            <textarea
                                placeholder="Catatan/Keluhan"
                                class="textarea textarea-bordered w-full h-40"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <input
                                type="date"
                                placeholder="Tanggal temu"
                                class="input input-bordered w-full"
                            />
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
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm">Renovasi</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm">Civil</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm">Landscape</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm"
                                        >Melayani Luar Kota</span
                                    >
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm">Build</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm">Maintenance</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm">Design</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
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
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm">Diskusi Online</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-sm checkbox-error"
                                    />
                                    <span class="text-sm">Diskusi Offline</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                class="checkbox checkbox-sm"
                            />
                            <span class="text-sm">Saya bukan robot</span>
                            <img
                                src="https://www.gstatic.com/recaptcha/api2/logo_48.png"
                                alt="reCAPTCHA"
                                class="h-8"
                            />
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button
                        type="submit"
                        class="btn btn-error text-white px-12 rounded-full"
                    >
                        Buat Janji Temu
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

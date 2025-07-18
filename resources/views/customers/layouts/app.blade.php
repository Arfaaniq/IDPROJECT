<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link
        rel="shortcut icon"
        href="{{ asset('assets/Asset 1.png') }}"
        type="image/png" />

    <title>@yield('title', 'ID PROJECT - One Stop Service')</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css"
        rel="stylesheet"
        type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "project-red": "#ff0000",
                    },
                },
            },
        };
    </script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

    @stack('styles')
</head>

<body>
    <div class="bg-gray-700 text-white text-sm py-2">
        <div
            class="container mx-auto px-4 flex flex-wrap justify-between items-center">
            <div
                class="flex flex-wrap items-center gap-4 text-xs md:text-sm">
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-red-500"></i>
                    <span>Town House Buena Central Park Blok Lexington No.
                        112 B, Kota Batam, Kep. Riau</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-envelope text-red-500"></i>
                    <span>id.project.official@gmail.com</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-phone text-red-500"></i>
                    <span>0778 - 2552963 | 0812 - 7123 - 8443</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="navbar">
                <div class="navbar-start">
                    <div class="dropdown lg:hidden">
                        <div
                            tabindex="0"
                            role="button"
                            class="btn btn-ghost">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </div>
                        <ul
                            tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                                <a
                                    href="{{ route('home') }}"
                                    class="font-medium">{{ __('content.home') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('about') }}"
                                    class="font-medium">{{ __('content.about') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('service') }}"
                                    class="font-medium">{{ __('content.service') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('blog') }}"
                                    class="font-medium">{{ __('content.blog') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('customer.projects') }}" class="font-medium">{{ __('content.portfolio') }}</a>
                            </li>

                            {{-- Menu Contact dan Status hanya untuk user yang sudah login --}}
                            @auth
                            <li>
                                <a
                                    class="font-medium {{ request()->routeIs('orderservice*') ? 'text-red-500' : '' }}"
                                    href="{{ route('orderservice.form') }}">{{ __('content.contact') }}</a>
                            </li>
                            <li>
                                <a
                                    class="font-medium {{ request()->routeIs('customer.status') ? 'text-red-500' : '' }}"
                                    href="{{ route('customer.status') }}">{{ __('content.status') }}</a>
                            </li>
                            @endauth
                        </ul>
                    </div>

                    <a href="{{ route('home') }}" class="flex items-center">
                        <img
                            src="{{ asset('assets/Asset 1.png') }}"
                            alt="ID Project Logo"
                            class="h-10 mr-2" />
                        <div>
                            <div class="text-xl font-bold text-gray-800">
                                ID PROJECT
                            </div>
                            <div class="text-xs text-gray-600">
                                ONE STOP SERVICE
                            </div>
                        </div>
                    </a>
                </div>

                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1">
                        <li>
                            <a
                                href="{{ route('home') }}"
                                class="font-medium hover:text-red-500">{{ __('content.home') }}</a>
                        </li>
                        <li>
                            <a
                                href="{{ route('about') }}"
                                class="font-medium hover:text-red-500">{{ __('content.about') }}</a>
                        </li>
                        <li>
                            <a
                                href="{{ route('service') }}"
                                class="font-medium hover:text-red-500">{{ __('content.service') }}</a>
                        </li>
                        <li>
                            <a
                                href="{{ route('blog') }}"
                                class="font-medium hover:text-red-500">{{ __('content.blog') }}</a>
                        </li>
                        <li>
                            <a
                                href="{{ route('customer.projects') }}"
                                class="font-medium hover:text-red-500">{{ __('content.portfolio') }}</a>
                        </li>

                        {{-- Menu Contact dan Status hanya untuk user yang sudah login --}}
                        @auth
                        <li>
                            <a
                                class="font-medium hover:text-red-500 {{ request()->routeIs('orderservice*') ? 'text-red-500 font-semibold' : '' }}"
                                href="{{ route('orderservice.form') }}">{{ __('content.contact') }}</a>
                        </li>
                        <li>
                            <a
                                class="font-medium hover:text-red-500 {{ request()->routeIs('customer.status') ? 'text-red-500 font-semibold' : '' }}"
                                href="{{ route('customer.status') }}">{{ __('content.status') }}</a>
                        </li>
                        @endauth
                    </ul>
                </div>

                <div class="navbar-end">
                    <div class="flex gap-2 items-center">
                        {{-- Language Switch --}}
                        @php
                        $locale = session('locale', config('app.locale'));
                        @endphp

                        <div class="flex items-center rounded-full bg-gray-700 p-1 w-[90px]">
                            <a href="{{ route('change.language', 'id') }}"
                                class="w-1/2 text-center py-1 rounded-full text-xs font-semibold transition
                                {{ $locale == 'id' ? 'bg-red-500 text-white' : 'text-gray-300' }}">
                                Id
                            </a>
                            <a href="{{ route('change.language', 'en') }}"
                                class="w-1/2 text-center py-1 rounded-full text-xs font-semibold transition
                                {{ $locale == 'en' ? 'bg-red-500 text-white' : 'text-gray-300' }}">
                                En
                            </a>
                        </div>

                        @auth
                        {{-- Tombol Logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-outline btn-sm border-red-500 text-red-500 hover:bg-red-500 hover:text-white">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                        @else
                        {{-- Tombol Login --}}
                        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">
                            <i class="fas fa-sign-in-alt"></i>
                            <span class="hidden sm:inline">Login</span>
                        </a>

                        @if (Route::has('register'))
                        {{-- Tombol Register --}}
                        <a
                            href="{{ route('register') }}"
                            class="btn btn-sm bg-red-600 hover:bg-red-700 text-white border-none">
                            <i class="fas fa-user-plus"></i>
                            <span class="hidden sm:inline">Register</span>
                        </a>
                        @endif
                        @endauth
                        @guest
                        {{-- Dropdown Admin Login -- Hanya muncul ketika user belum login --}}
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-sm">
                                <i class="fas fa-user-shield"></i>
                                <span class="hidden sm:inline">Admin</span>
                            </div>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                <li><a href="{{ route('admin.login') }}">Login Admin</a></li>
                            </ul>
                        </div>
                        @endguest
                    </div>
                </div>

            </div>
        </div>

        <main>@yield('content')</main>

        <footer class="text-white py-16" style="background-color: #3b3b3b">
            <div class="container mx-auto px-4">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Quicklinks</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li>
                                <a
                                    href="{{ route('home') }}"
                                    class="hover:text-white transition-colors">{{ __('content.home') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('about') }}"
                                    class="hover:text-white transition-colors">{{ __('content.about') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('service') }}"
                                    class="hover:text-white transition-colors">{{ __('content.service') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('blog') }}"
                                    class="hover:text-white transition-colors">{{ __('content.blog') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customer.projects') }}"
                                    class="hover:text-white transition-colors">{{ __('content.portfolio') }}</a>
                            </li>

                            {{-- Menu Contact dan Status di footer hanya untuk user yang sudah login --}}
                            @auth
                            <li>
                                <a
                                    href="{{ route('orderservice.form') }}"
                                    class="hover:text-white transition-colors">{{ __('content.contact') }}</a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('customer.status') }}"
                                    class="hover:text-white transition-colors">{{ __('content.status') }}</a>
                            </li>
                            @endauth
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-4">Contacts</h3>
                        <address class="not-italic">
                            <ul class="space-y-2 text-gray-300">
                                <li>
                                    <a
                                        href="https://www.google.com/maps/search/?api=1&query=Town+House+Buana+Central+Park+Blok+Lexington+Batam"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="hover:text-white transition-colors">
                                        Town House Buana Central Park Blok
                                        Lexington No. 112 B, Kota Batam, Kep.
                                        Riau.
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="mailto:i.d.project.official01@gmail.com"
                                        class="hover:text-white transition-colors">
                                        i.d.project.official01@gmail.com
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://api.whatsapp.com/send/?phone=6289531498443"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="hover:text-white transition-colors">
                                        0778 - 3852963 / 0895 - 3149 - 8443
                                    </a>
                                </li>
                            </ul>
                        </address>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-4">Legal</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-white transition-colors">Terms and conditions</a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="hover:text-white transition-colors">Privacy policy</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-4">Social Links</h3>
                        <div class="flex space-x-3">
                            <a
                                href="https://www.facebook.com/apriliane.fress"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Facebook"
                                class="bg-white rounded-full p-2 text-gray-800 hover:bg-gray-200 transition-colors">
                                <i class="fab fa-facebook-f fa-fw"></i>
                            </a>
                            <a
                                href="https://www.instagram.com/id.project.official"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Instagram"
                                class="bg-white rounded-full p-2 text-gray-800 hover:bg-gray-200 transition-colors">
                                <i class="fab fa-instagram fa-fw"></i>
                            </a>
                            <a
                                href="#"
                                aria-label="YouTube"
                                class="bg-white rounded-full p-2 text-gray-800 hover:bg-gray-200 transition-colors">
                                <i class="fab fa-youtube fa-fw"></i>
                            </a>
                            <a
                                href="https://www.tiktok.com/@id.project.official"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Tiktok"
                                class="bg-white rounded-full p-2 text-gray-800 hover:bg-gray-200 transition-colors">
                                <i class="fab fa-tiktok fa-fw"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="text-center text-gray-400 mt-16 pt-8 border-t border-gray-700">
                    Copyright © 2025. All Rights Reserved.
                </div>
            </div>
        </footer>

        <div class="fixed bottom-6 left-6 z-50 flex flex-col gap-4">
            <a
                href="https://wa.me/628116585494"
                target="_blank"
                class="btn btn-success text-white rounded-full shadow-lg flex items-center gap-2 px-6 hover:scale-105 transition-transform">
                <i class="fab fa-whatsapp text-xl"></i>
                <span>Free Consultation</span>
            </a>

            <div
                id="backToTopBtn"
                class="opacity-0 invisible transition-all duration-300 transform translate-y-10">
                <button
                    class="btn btn-circle bg-[#FF0000] hover:bg-[#cc0000] text-white shadow-lg flex items-center justify-center"
                    aria-label="Back to top"
                    onclick="scrollToTop()">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 15l7-7 7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <style>
            .focus\:ring-project-red:focus {
                --tw-ring-color: #ff0000;
                --tw-ring-opacity: 0.5;
            }

            #backToTopBtn {
                position: fixed;
                bottom: 20px;
                right: 20px;
            }

            input[type="checkbox"] {
                accent-color: #ff0000;
            }

            .nav-link.active {
                color: #ff0000;
                font-weight: 600;
            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const backToTopBtn = document.getElementById("backToTopBtn");
                const scrollThreshold = 300;

                function checkScrollPosition() {
                    if (window.scrollY > scrollThreshold) {
                        backToTopBtn.classList.remove(
                            "opacity-0",
                            "invisible",
                            "translate-y-10"
                        );
                        backToTopBtn.classList.add(
                            "opacity-100",
                            "visible",
                            "translate-y-0"
                        );
                    } else {
                        backToTopBtn.classList.add(
                            "opacity-0",
                            "invisible",
                            "translate-y-10"
                        );
                        backToTopBtn.classList.remove(
                            "opacity-100",
                            "visible",
                            "translate-y-0"
                        );
                    }
                }

                window.scrollToTop = function() {
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                };

                window.addEventListener("scroll", checkScrollPosition);
                checkScrollPosition();
            });
        </script>

        <script>
            const elSwitchs = document.querySelectorAll(".elSwitch");
            elSwitchs.forEach((e) => {
                e.addEventListener("click", function() {
                    // Nilai 'left' disesuaikan agar pas dengan kontainer
                    if (e.classList.contains("left-[78px]")) {
                        e.classList.remove("left-[78px]");
                        e.classList.add("left-1");
                    } else {
                        e.classList.remove("left-1");
                        e.classList.add("left-[78px]");
                    }
                });
            });
        </script>

</body>
<script src="https://unpkg.com/alpinejs" defer></script>

</html>
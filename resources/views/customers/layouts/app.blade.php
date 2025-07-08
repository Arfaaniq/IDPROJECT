<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('assets/Asset 1.png') }}" type="image/png" />
    <title>@yield('title', 'ID PROJECT - One Stop Service')</title>
    <!-- Meta tags dan CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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
    <style>
        .hero-section {
            background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1470');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .hero-section>div {
            position: relative;
            z-index: 1;
        }

        .carousel-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .carousel-slide.active {
            opacity: 1;
        }

        .navbar {

            /* z-index: 1000; */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
            background-color: #2E2F3C;
            background-color: white;
            backdrop-filter: blur(1px);
            /* Sesuaikan dengan warna navbar Anda */
        }

        .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid #fff;
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .footer {
            background-color: #2e2f3c;
            margin-top: auto;
        }

        .dropdown-content a:hover {
            background-color: #ff0000 !important;
            color: white !important;
        }

        .modal {
            display: none !important;
        }

        .hero-with-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
            url("{{ asset('assets/wallpaperflare-cropped2.jpg') }}");
            background-size: cover;
            background-position: center;
        }

        .judul {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        .project-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .project-card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .project-card .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            transition: top 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-card:hover .overlay {
            top: 0;
        }
    </style>
</head>

<body>

    @include('customers.layouts.appbar')
    @include('customers.layouts.navigasi')

    <main class="w-full">
        @yield('content')
    </main>
    
    @include('customers.layouts.footer')
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const topBar = document.getElementById('topBar');
            let lastScroll = 0;
            const scrollThreshold = 100; // Jarak scroll sebelum top-bar disembunyikan

            window.addEventListener('scroll', function() {
                const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                if (currentScroll <= 0) {
                    // Di bagian paling atas, tampilkan top-bar
                    topBar.classList.remove('hide');
                    return;
                }

                if (currentScroll > lastScroll && currentScroll > scrollThreshold) {
                    // Scroll ke bawah melebihi threshold
                    topBar.classList.add('hide');
                } else if (currentScroll < lastScroll) {
                    // Scroll ke atas
                    topBar.classList.remove('hide');
                }

                lastScroll = currentScroll;
            });
        });
    </script>

</body>

</html>
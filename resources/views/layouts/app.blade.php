<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ID Project') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- token kalender -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <!-- bootstrap terbaru -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- bootstrap 5 theming -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <!-- izitoast css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css datepicker ubah tanggal -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- filter table event -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
html,
body {
    font-family: 'Inter', sans-serif;
    height: 100%;
    margin: 0;
    padding: 0;
}


.sidebar {
    width: 60px;

    /* fallback */
    height: 100dvh;
    /* modern browsers */
    transition: width 0.3s;
    overflow-x: hidden;
    background-color: #fff;
    border-right: 1px solid #dee2e6;
    overflow-y: auto;
}


.sidebar.expanded {
    width: 250px;
    background-color: #343a40;
    color: white;
}


.sidebar.expanded .nav-link:hover {
    background-color: #ffd4cb;
    color: white;
}


.sidebar .nav-link {
    display: flex;
    align-items: center;
    padding: 14px 16px;
    white-space: nowrap;
}

.sidebar .nav-link i {
    font-size: 1.25rem;
    margin-right: 15px;
    margin-left: 6px;
}

.sidebar.collapsed .label {
    display: none;
}

.sidebar .nav-section-title {
    padding: 10px 16px;
    font-size: 0.75rem;
    color: gray;
    text-transform: uppercase;
}

.disabled-link {
    pointer-events: none;
    background-color: transparent !important;
    color: #adb5bd !important;
}

.disabled-link:hover {
    background-color: transparent !important;
    color: #adb5bd !important;
}
</style>

<body class="font-sans antialiased">
    <div class="flex h-screen min-vh-100">
        @include('layouts.sidebar')
        <div class="flex-grow-1 d-flex flex-column">
            <div class="flex-shrink-0">
                @include('layouts.navigation')
            </div>
            <main class="p-4 flex-grow-1 overflow-auto">
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Page Heading -->
    <!-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif -->

    <!-- Page Content -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
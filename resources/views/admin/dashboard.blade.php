<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!-- TailwindCSS and DaisyUI -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/daisyui/2.51.5/full.css" rel="stylesheet" />
    <!-- Alpine.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- izitoast css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css datepicker ubah tanggal -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        .main-content {
            padding: 1rem;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
        }
        @media (min-width: 1024px) {
            .main-content {
                padding: 1rem 2rem;
            }
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">
    @extends('layouts.app')
    @section('title', 'Dashboard')
    @section('content')
    <div class="main-content">
        <!-- Dashboard Content -->
        <div x-show="currentPage === 'dashboard'">
            <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
            <div class="mb-6 bg-white p-4 rounded-lg shadow-md flex items-center gap-4">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="flex flex-wrap items-center gap-4">
                    <div>
                        <label for="month-filter" class="block text-sm font-medium text-gray-700">Filter
                            Bulan:</label>
                        <select name="month" id="month-filter" class="select select-bordered w-full max-w-xs">
                            <option value="">Semua Bulan</option>
                            @foreach($months as $num => $name)
                            <option value="{{ $num }}"
                                {{ (string)$currentMonth === (string)$num ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="year-filter" class="block text-sm font-medium text-gray-700">Filter
                            Tahun:</label>
                        <select name="year" id="year-filter" class="select select-bordered w-full max-w-xs">
                            <option value="">Semua Tahun</option>
                            @foreach($years as $year)
                            <option value="{{ $year }}"
                                {{ (string)$currentYear === (string)$year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-auto">Terapkan Filter</button>
                </form>
            </div>

            <!-- Dashboard Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Pie Chart -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold mb-4">Statistics</h2>
                    <div class="flex justify-center">
                        <canvas id="pieChart" width="200" height="200"></canvas>
                    </div>
                </div>

                <!-- Statistik Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 col-span-1 md:col-span-2">
                    <!-- Menunggu -->
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <div class="text-gray-500 text-sm">Total Nominal Invoice (Selesai)</div>
                        <div class="text-2xl font-bold">Rp. {{ number_format($totalInvoiceAmount, 0, ',', '.') }}
                        </div>
                        <span class="text-sm text-gray-600">({{ $countSelesai }} Invoice Selesai)</span>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <div class="text-gray-500 text-sm">Menunggu</div>
                        <div class="text-2xl font-bold">{{ $countMenunggu }}</div>
                        <a href="{{ route('verifikasi', ['status' => 'Menunggu']) }}"
                            class="text-blue-500 text-sm mt-2 inline-block">View More</a>
                    </div>

                    <!-- Diterima -->
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <div class="text-gray-500 text-sm">Diterima</div>
                        <div class="text-2xl font-bold">{{ $countDiterima }}</div>
                        <a href="{{ route('verifikasi', ['status' => 'Diterima']) }}"
                            class="text-blue-500 text-sm mt-2 inline-block">View More</a>
                    </div>

                    <!-- Ditolak -->
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <div class="text-gray-500 text-sm">Ditolak</div>
                        <div class="text-2xl font-bold">{{ $countDitolak }}</div>
                        <a href="{{ route('verifikasi', ['status' => 'Ditolak']) }}"
                            class="text-blue-500 text-sm mt-2 inline-block">View More</a>
                    </div>

                    <!-- On Progress -->
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <div class="text-gray-500 text-sm">On Progress</div>
                        <div class="text-2xl font-bold">{{ $countOnProgress }}</div>
                        <a href="{{ route('verifikasi', ['status' => 'On Progress']) }}"
                            class="text-blue-500 text-sm mt-2 inline-block">View More</a>
                    </div>

                    <!-- Selesai -->
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <div class="text-gray-500 text-sm">Selesai</div>
                        <div class="text-2xl font-bold">{{ $countSelesai }}</div>
                        <a href="{{ route('riwayat', ['status' => 'Selesai']) }}"
                            class="text-blue-500 text-sm mt-2 inline-block">View More</a>
                    </div>

                    <!-- Total -->
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <div class="text-gray-500 text-sm">Total Pesanan</div>
                        <div class="text-2xl font-bold">{{ $countTotal }}</div>
                    </div>
                </div>

                <!-- Recent untuk bagian Verifikasi Table -->
                <div class="bg-white p-5 rounded-lg shadow-md col-span-1 md:col-span-3">
                    <h2 class="text-lg font-semibold mb-4">Recent Verifikasi</h2>
                    <div class="overflow-x-auto">
                        <table class="table w-full table-zebra">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Temu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($verify as $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->nama_lengkap }}</td>
                                    <td>{{ $v->tanggal_temu }}</td>
                                    <td>
                                        @if ($v->status == 'Diterima')
                                        <span class="badge badge-success">Diterima</span>
                                        @elseif ($v->status == 'Menunggu')
                                        <span class="badge badge-warning">Menunggu</span>
                                        @elseif ($v->status == 'Ditolak')
                                        <span class="badge badge-error">Ditolak</span>
                                        @else
                                        <span class="badge badge-neutral">{{ $v->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('verifikasi', $v->id) }}"
                                            class="btn btn-xl btn-outline btn-primary text-white">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Initialization Scripts -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie Chart
        const pieCtx = document.getElementById("pieChart").getContext("2d");
        const pieChart = new Chart(pieCtx, {
            type: "pie",
            data: {
                labels: ["Menunggu", "Diterima", "Ditolak", "On Progress", "Selesai"],
                datasets: [{
                    label: "Jumlah Pesanan",
                    data: [
                        parseInt('{{ $countMenunggu ?? 0 }}'),
                        parseInt('{{ $countDiterima ?? 0 }}'),
                        parseInt('{{ $countDitolak ?? 0 }}'),
                        parseInt('{{ $countOnProgress ?? 0 }}'),
                        parseInt('{{ $countSelesai ?? 0 }}')
                    ],
                    backgroundColor: [
                        "#FFC107",
                        "#28A745",
                        "#DC3545",
                        "#17A2B8",
                        "#007BFF"
                    ],
                    borderWidth: 1,
                }, ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "bottom",
                    },
                },
            },
        });
    });
    </script>
    @endsection
</body>
</html>
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

</head>

<body class="bg-gray-100 min-h-screen">
    @extends('layouts.app')
    @section('title', 'Dashboard')
    @section('content')
    <div>
        <!-- Main Content -->
        <div :class="{'ml-64': sidebarOpen, 'ml-0': !sidebarOpen}" class="flex-1 p-6 transition-all duration-300">
            <!-- Dashboard Content -->
            <div x-show="currentPage === 'dashboard'">
                <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
                <div class="mb-6 bg-white p-4 rounded-lg shadow-md flex items-center gap-4">
                    <form action="{{ route('admin.dashboard') }}" method="GET" class="flex items-center gap-4">
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

                    <!-- Calendar -->
                    <!-- <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold mb-4">Calendar</h2>
                        <div class="calendar">
                            <div class="flex justify-between items-center mb-4">
                                <button class="btn btn-sm btn-ghost">&lt;</button>
                                <h3 class="font-medium">May 2025</h3>
                                <button class="btn btn-sm btn-ghost">&gt;</button>
                            </div>
                            <div class="grid grid-cols-7 gap-1 text-center">
                                <div class="text-gray-500 font-medium">Su</div>
                                <div class="text-gray-500 font-medium">Mo</div>
                                <div class="text-gray-500 font-medium">Tu</div>
                                <div class="text-gray-500 font-medium">We</div>
                                <div class="text-gray-500 font-medium">Th</div>
                                <div class="text-gray-500 font-medium">Fr</div>
                                <div class="text-gray-500 font-medium">Sa</div>

                                <div class="text-gray-400">27</div>
                                <div class="text-gray-400">28</div>
                                <div class="text-gray-400">29</div>
                                <div class="text-gray-400">30</div>
                                <div>1</div>
                                <div>2</div>
                                <div>3</div>

                                <div>4</div>
                                <div>5</div>
                                <div>6</div>
                                <div>7</div>
                                <div>8</div>
                                <div>9</div>
                                <div>10</div>

                                <div>11</div>
                                <div>12</div>
                                <div>13</div>
                                <div>14</div>
                                <div>15</div>
                                <div>16</div>
                                <div>17</div>

                                <div>18</div>
                                <div class="bg-primary text-white rounded-full">19</div>
                                <div>20</div>
                                <div>21</div>
                                <div>22</div>
                                <div>23</div>
                                <div>24</div>

                                <div>25</div>
                                <div>26</div>
                                <div>27</div>
                                <div>28</div>
                                <div>29</div>
                                <div>30</div>
                                <div>31</div>
                            </div>
                        </div>
                    </div> -->


                    <!-- Statistik Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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

                    <br>

                    <!-- Recent untuk bagian Verifikasi Table -->
                    <div class="bg-white p-5 mt-5 rounded-lg shadow-md md:col-span-2">
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

            <!-- Bagian new kalender -->
            @endsection

            <!-- Chart Initialization Scripts -->
            <!-- js untuk diagram -->
            <script>
            // Chart Initialization Scripts
            // bagian verifikasi pesanan
            document.addEventListener("DOMContentLoaded", function() {
                // Pie Chart
                const pieCtx = document.getElementById("pieChart").getContext("2d");
                const pieChart = new Chart(pieCtx, {
                    type: "pie",
                    data: {
                        labels: ["Menunggu", "Diterima", "Ditolak", "On Progress", "Selesai"],
                        datasets: [{
                            label: "Jumlah Pesanan",
                            // Menggunakan nilai PHP langsung, memastikan default 0 jika null
                            data: [
                                parseInt('{{ $countMenunggu ?? 0 }}'),
                                parseInt('{{ $countDiterima ?? 0 }}'),
                                parseInt('{{ $countDitolak ?? 0 }}'),
                                parseInt('{{ $countOnProgress ?? 0 }}'),
                                parseInt('{{ $countSelesai ?? 0 }}')
                            ],
                            backgroundColor: [
                                "#FFC107", // Kuning (Menunggu)
                                "#28A745", // Hijau (Diterima)
                                "#DC3545", // Merah (Ditolak)
                                "#17A2B8", // Biru (On Progress)
                                "#007BFF" // Biru Tua (Selesai)
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
            <!-- endsection -->
        </div>

</body>

</html>
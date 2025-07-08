<!-- ini tidak digunakan -->





<!DOCTYPE html>
<html lang="en" data-theme="light">

<!-- ini adalah dashboard user -->

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
                    <div class="bg-white p-4 rounded-lg shadow-md">
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
                    </div>

                    <!-- Statistik Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Menunggu -->
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


                    <!-- Table -->
                    <!-- Recent Verifikasi Table -->
                    <div class="bg-white p-4 rounded-lg shadow-md md:col-span-2">
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
                    <!-- Map -->
                    <div class="bg-white p-4 rounded-lg shadow-md lg:col-span-3">
                        <h2 class="text-lg font-semibold mb-4">Location Map</h2>
                        <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="mt-2 text-gray-600">Map Placeholder</p>
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
                        labels: ["Red", "Blue", "Yellow", "Green"],
                        datasets: [{
                            label: "Dataset",
                            data: [12, 19, 3, 5],
                            backgroundColor: [
                                "#FF0000",
                                "#36A2EB",
                                "#FFCE56",
                                "#4BC0C0",
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
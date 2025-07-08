<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- token kalender -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <!-- bootstrap terbaru fullcalender cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- bootstrap 5 theming -->
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    @extends('layouts.app')
    @section('title', 'kalender')

    @section('content')
    <nav aria-label="breadcrumb" class="text-kecil">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active" aria-current="page">Kalender Event</li>
        </ol>
    </nav>

    <!-- ini adalah kode untuk kelandernya -->
    <div class="bg-white p-5 mt-5 rounded-lg shadow-md md:col-span-2 py-5" style="padding-top: 70px;">
        <h5 class="mb-4"><b>Kalender event ID Project</b></h5>
        <div class="flex row justify-center">
            <div class="col-lg-12 col-md-4">
                <div class="card shadow rounded-2">
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- pastikan ID-nya sesuai dengan panggilan id -->
                            <button id="btn-tambah-event" class="btn btn-primary mb-3">
                                <i class="bi bi-plus-circle"></i> Tambah Event
                            </button>
                        </div>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal tambah events bootstrap -->
    <!-- <div id="modal-action" class="modal" tabindex="-1"> -->
    <!-- Konten modal akan dimuat secara dinamis melalui AJAX -->
    <!-- </div> -->
    <div id="modal-action" class="modal" tabindex="-1">



    </div>

    <!-- Table detail kalender -->
    <!-- jangan lupa bootstrap dan script js,  untuk table filter (let eventTable;), loadEventTable daari nama fungsi dimasukkan ke eventClick, Drop, Destroy-->
    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <!-- judul elemen -->
                <h5 class="fw-bold mb-3">Daftar Event</h5>
                <!-- filter baris -->
                <div class="row g-3 align-items-end mb-3">
                    <!-- filter berdasarkan kategori -->
                    <div class="col-md-3">
                        <label for="filter-category" class="form-label">Filter Kategori:</label>
                        <select id="filter-category" class="form-select">
                            <option value="">Semua</option>
                            <option value="success">Success</option>
                            <option value="warning">Warning</option>
                            <option value="danger">Danger</option>
                            <option value="info">Info</option>
                        </select>
                    </div>
                    <!-- filter berdasarkan bulan -->
                    <div class="col-md-3">
                        <label for="filter-month" class="form-label">Filter Bulan:</label>
                        <select id="filter-month" class="form-select">
                            <option value="">Semua</option>
                            <option value="-01-">Januari</option>
                            <option value="-02-">Februari</option>
                            <option value="-03-">Maret</option>
                            <option value="-04-">April</option>
                            <option value="-05-">Mei</option>
                            <option value="-06-">Juni</option>
                            <option value="-07-">Juli</option>
                            <option value="-08-">Agustus</option>
                            <option value="-09-">September</option>
                            <option value="-10-">Oktober</option>
                            <option value="-11-">November</option>
                            <option value="-12-">Desember</option>
                        </select>
                    </div>
                    <!-- button untuk mereset semua filter -->
                    <div class="col-md-3">
                        <button id="reset-filter" class="btn btn-secondary mt-3">Reset Filter</button>
                    </div>
                </div>

                <!-- menampilkan table daftar event -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped shadow-lg rounded-3 overflow-hidden"
                        id="table-events">
                        <thead class="table-dark text-center">
                            <tr>
                                <th class="text-center">Judul</th>
                                <th>Kategori</th>
                                <th>Jam</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle text-center">
                            <!-- Data akan diisi melalui JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <!-- <div id='calendar'></div> -->

    <!-- kalender -->
    <!-- ini adalah scripts untuk mengelola tampilan kalender -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.7/index.global.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- datepicker cdn untuk ubah tanggal-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- untuk filter event bagian table -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- scripts -->
    <script>
    // DISINI KALENDER MENGGUNAKAN FULLCALENDER
    // tampung dulu modalnya
    const modal = $('#modal-action')
    // csrf_meta tokennya.
    const csrfToken = $('meta[name=csrf_token]').attr('content')

    // untuk table filter
    let eventTable;

    // script kalender menggunakan cdn fullcalender
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap5',
            // disini tambahkan agar mengarah ke routes
            events: `{{ route('events.list') }}`,
            editable: true,
            dateClick: function(info) {
                $.ajax({
                    url: `{{ route('events.create') }}`,
                    data: {
                        start_date: info.dateStr,
                        end_date: info.dateStr
                    },
                    success: function(res) {
                        modal.html(res).modal('show');
                        // Inisialisasi datepicker setelah modal ditampilkan
                        $('.datepicker').datepicker({
                            todayHighlight: true,
                            format: 'yyyy-mm-dd'
                        });
                        $('#form-action').on('submit', function(e) {
                            e.preventDefault()
                            const form = this
                            const formData = new FormData(form)
                            $.ajax({
                                url: form.action,
                                method: form.method,
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(res) {
                                    modal.modal('hide')
                                    calendar.refetchEvents()
                                },
                                error: function(res) {
                                    iziToast.error({
                                        title: 'Error',
                                        message: 'Gagal menyimpan data!',
                                        position: 'topRight'
                                    });
                                }
                            })

                        })
                    }
                })
            },
            eventClick: function({
                event
            }) {
                $.ajax({
                    url: `/admin/events/${event.id}/edit`,
                    success: function(res) {
                        modal.html(res).modal('show')
                        loadEventTable(); // Tambahkan ini
                        $('#form-action').on('submit', function(e) {
                            e.preventDefault()
                            const form = this
                            const formData = new FormData(form)
                            $.ajax({
                                url: form.action,
                                method: form.method,
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(res) {
                                    modal.modal('hide')
                                    calendar.refetchEvents();
                                },
                                error: function(xhr) {
                                    // Tangani kesalahan jika ada
                                    alert(
                                        'Terjadi kesalahan saat menyimpan data.'
                                    );
                                }
                            })
                        })
                    }
                })
            },
            // function untuk memindahkan event kalender dengan metode drag
            eventDrop: function(info) {
                const event = info.event
                $.ajax({
                    url: `/admin/events/${event.id}`,
                    method: 'put',
                    data: {
                        id: event.id,
                        start_date: event.startStr,
                        end_date: event.end.toISOString().substring(0, 10),
                        time: event.extendedProps.time ?? '00:00:00',
                        title: event.title,
                        category: event.extendedProps.category
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        accept: 'application/json'
                    },
                    success: function(res) {
                        iziToast.success({
                            title: 'Seccess',
                            message: res.message,
                            position: 'topRight'
                        });
                        loadEventTable(); // Tambahkan ini
                    },
                    error: function(res) {
                        const message = res.responseJSON.message
                        info.revert()
                        iziToast.error({
                            title: 'Error',
                            message: message ?? 'Terjadi kesalahan!',
                            position: 'topRight'
                        });
                    }
                })
            },
            // untuk melakukan resize pada tanggal event
            eventResize: function(info) {
                const {
                    event
                } = info
                $.ajax({
                    url: `/admin/events/${event.id}`,
                    method: 'put',
                    // disini harus mengirim data untuk drag eventnya
                    data: {
                        id: event.id,
                        start_date: event.startStr,
                        end_date: event.end.toISOString().substring(0, 10),
                        time: event.extendedProps.time ?? '00:00:00',
                        title: event.title,
                        category: event.extendedProps.category
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        accept: 'application/json'
                    },
                    success: function(res) {
                        iziToast.success({
                            title: 'Seccess',
                            message: res.message,
                            position: 'topRight'
                        });
                        loadEventTable(); // Tambahkan ini
                    },
                    error: function(res) {
                        const message = res.responseJSON.message
                        info.revert()
                        iziToast.error({
                            title: 'Error',
                            message: message ?? 'Terjadi kesalahan!',
                            position: 'topRight'
                        });
                    }
                })
            }
        });
        calendar.render();
        loadEventTable(); // Tambahkan ini

        // Untuk bagian tambah kalender secara manual
        $('#btn-tambah-event').on('click', function() {
            $.ajax({
                url: `{{ route('events.create') }}`,
                success: function(res) {
                    modal.html(res).modal('show');
                    loadEventTable(); // Tambahkan ini
                    $('.datepicker').datepicker({
                        todayHighlight: true,
                        format: 'yyyy-mm-dd'
                    });

                    $('#form-action').on('submit', function(e) {
                        e.preventDefault();
                        const form = this;
                        const formData = new FormData(form);

                        $.ajax({
                            url: form.action,
                            method: form.method,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                modal.modal('hide');
                                iziToast.success({
                                    title: 'Success',
                                    message: res.message
                                });
                                calendar.refetchEvents();
                                loadEventTable();
                            },
                            error: function(err) {
                                iziToast.error({
                                    title: 'Error',
                                    message: 'Gagal menambahkan event.'
                                });
                            }
                        });
                    });
                }
            });
        });

        // filter table
        let eventTable;

        // untuk table eventnya
        function loadEventTable() {
            $.ajax({
                url: `{{ route('events.all') }}`,
                method: 'GET',
                success: function(events) {
                    const tbody = $('#table-events tbody');
                    tbody.empty(); // Kosongkan dulu
                    // Tentukan kelas baris berdasarkan kategori
                    const rowClass = event.category ? `table-${event.category}` :
                        '';
                    events.forEach(event => {
                        const row = `
                    <tr class="${rowClass}">
                        <td>${event.title}</td>
                         <td>
                            <span class="badge bg-${event.category ?? 'secondary'}">
                                ${event.category ? event.category.charAt(0).toUpperCase() + event.category.slice(1) : '-'}
                            </span>
                        </td>
                         <td>${event.time}</td>
                        <td>${event.start}</td>
                        <td>${event.end ?? '-'}</td>
                    </tr>
                `;
                        tbody.append(row);
                    });
                    // untuk filter search
                    if ($.fn.DataTable.isDataTable('#table-events')) {
                        eventTable.destroy(); // destroy dulu kalau sudah ada
                    }

                    eventTable = $('#table-events').DataTable();
                    // untuk filternya maybe?
                    // Filtering by category
                    $('#filter-category').on('change', function() {
                        const value = $(this).val();
                        eventTable.column(1).search(value).draw();
                    });
                    // untuk filter berdasarkan bulan
                    $('#filter-month').on('change', function() {
                        const month = $(this)
                            .val(); // e.g., "-05-" untuk Mei
                        eventTable.column(2).search(month)
                            .draw(); // Kolom ke-2 = Start Date
                    });
                    // js untuk reset semua filternya
                    $('#reset-filter').on('click', function() {
                        $('#filter-category').val('');
                        $('#filter-month').val('');
                        eventTable.search('').columns().search('').draw();
                    });
                },
                error: function() {
                    console.error('Gagal memuat data tabel event.');
                }
            });
        }

    });
    </script>

    @endsection
</body>

</html>
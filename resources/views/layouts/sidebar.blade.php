<div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar bg-white border-end collapsed">
        <div class="d-flex flex-column py-3">
            <!-- Toggle Sidebar untuk buka tutup drawernya -->
            <div class="container-fluid">
                <button id="toggleSidebar" class="btn btn-inline-secondary" style="width: 40px;"
                    onmouseover="this.classList.add('btn-outline-danger')"
                    onmouseout="this.classList.remove('btn-outline-danger')">
                    <i class="bi bi-list"></i>
                </button>

            </div>
            <!-- Menu Dashboard -->
            <ul class="nav nav-pills flex-column" id="sidebarMenu">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: #000000;"
                        :active="request()->routeIs('dashboard')">
                        <i class='bx bxs-dashboard'></i>
                        <span class="label">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                <li class="nav-item" style="width: 4rem;">
                    <a class="nav-link text-dark disabled-link">
                        <i style="color: #adb5bd;">--</i>
                        <span class="label" style="font-size: 10px; color: #adb5bd;">Kelola Layanan Lainnya</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('verifikasi') }}" class="nav-link" style="color: #000000;">
                        <i class="bi bi-check-circle"></i>
                        <span class="label">{{__('Verifikasi Jadwal')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link" style="color: #000000;">
                        <i class="bi bi-calendar-event"></i>
                        <span class="label">kalender</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('projects.index') }}" class="nav-link" style="color: #000000;">
                        <i class="bi bi-briefcase"></i>
                        <span class="label">Portofolio</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('instagram.index') }}" class="nav-link" style="color: #000000;">
                        <i class="bi bi-image"></i>
                        <span class="label">Instagram</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.blog.index') }}" class="nav-link" style="color: #000000;">
                        <i class="bi bi-journal-text"></i>
                        <span class="label">Blog</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('riwayat') }}" class="nav-link" style="color: #000000;">
                        <i class="bi bi-hourglass"></i>
                        <span class="label">Riwayat</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link disabled-link">
                        <i style="color: #adb5bd">--</i>
                        <span class="label" style="font-size: 10px; color: #adb5bd;">Selebihnya</span>
                    </a>
                </li>

                <li class="nav-item">
                    <form id="logoutForm" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link text-danger" style="background: none; border: none;">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="label">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('expanded');
        });
    </script>
</div>
@extends('layouts.app')
@section('title', __('blog.page_title'))
@section('content')
    <div id="alertContainer" class="position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>

    <div class="container mt-4">
        <h5 class="mb-4">Instagram Reels Manager</h5>

        <div class="mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBlogModal">
                <i class="bi bi-plus-circle me-1"></i>
                Tambah Reel Baru
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="reelsTable">
                <thead class="table-light">
                    <tr>
                        <th class="text-center text-danger">No</th>
                        <th class="text-center text-danger">Link</th>
                        <th class="text-center text-danger">Tanggal</th>
                        <th class="text-center text-danger">Aksi</th>
                    </tr>
                </thead>
                <tbody id="reelsTableBody">
                    <!-- Data akan dimuat dinamis dari server -->
                    @if(isset($reels) && $reels->count() > 0)
                        @foreach($reels as $index => $reel)
                        <tr data-id="{{ $reel->id }}">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>
                                <a href="{{ $reel->url }}" target="_blank" class="link link-primary text-sm break-all">
                                    {{ $reel->url }}
                                </a>
                            </td>
                            <td class="text-center">{{ $reel->posted_at ?? $reel->created_at->format('Y-m-d H:i') }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-warning" onclick="editEmbed({{ $reel->id }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteEmbed({{ $reel->id }})">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr id="noDataRow">
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                                <div class="mt-2">Belum ada data Instagram Reels</div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Reel -->
    <div class="modal fade" id="tambahBlogModal" tabindex="-1" aria-labelledby="tambahBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBlogModalLabel">
                        <i class="bi bi-instagram me-2"></i>
                        Tambah Instagram Reel
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addReelForm">
                        <div class="mb-3">
                            <label for="instagramUrl" class="form-label fw-semibold">Link Instagram Reel</label>
                            <input
                                type="url"
                                id="instagramUrl"
                                name="url"
                                placeholder="https://www.instagram.com/reel/..."
                                class="form-control"
                                required
                            />
                            <div class="form-text">
                                Contoh: https://www.instagram.com/reel/ABC123/
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary" form="addReelForm">
                        <span class="spinner-border spinner-border-sm me-1 d-none" role="status" aria-hidden="true" id="loadingSpinner"></span>
                        <span id="submitText">Tambah</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        <i class="bi bi-pencil-square text-warning me-2"></i>
                        Edit Instagram Embed
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editEmbedId" name="embed_id">
                        
                        <div class="mb-3">
                            <label for="editUrl" class="form-label fw-semibold">Link Instagram Reel</label>
                            <input type="url" class="form-control" id="editUrl" name="url" required>
                            <div class="form-text text-info">
                                Contoh: https://www.instagram.com/reel/ABC123/
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="editPostedAt" class="form-label fw-semibold">Tanggal Posting</label>
                            <input type="datetime-local" class="form-control" id="editPostedAt" name="posted_at" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary" onclick="updateEmbed()">
                        <i class="bi bi-check-circle me-1"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                        Konfirmasi Hapus
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="bi bi-trash3-fill text-danger" style="font-size: 3rem;"></i>
                        </div>
                        <p class="mb-2">Apakah Anda yakin ingin menghapus Instagram embed ini?</p>
                        <div class="bg-light p-3 rounded mb-3">
                            <strong id="deleteEmbedUrl" class="text-break"></strong>
                        </div>
                        <p class="text-danger small mb-0">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            Tindakan ini tidak dapat dibatalkan.
                        </p>
                    </div>
                    <input type="hidden" id="deleteEmbedId">
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>
                        Batal
                    </button>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                        <i class="bi bi-trash3 me-1"></i>
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // CSRF Token Setup
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Global variables
        let reelsData = [];
        
        // Alert Functions
        function showAlert(message, type = 'success') {
            const alertContainer = document.getElementById('alertContainer');
            const alertId = 'alert-' + Date.now();
            
            const alertTypes = {
                success: { icon: 'bi-check-circle-fill', class: 'alert-success' },
                error: { icon: 'bi-exclamation-triangle-fill', class: 'alert-danger' },
                warning: { icon: 'bi-exclamation-triangle-fill', class: 'alert-warning' },
                info: { icon: 'bi-info-circle-fill', class: 'alert-info' }
            };
            
            const alertConfig = alertTypes[type] || alertTypes.info;
            
            const alertHTML = `
                <div id="${alertId}" class="alert ${alertConfig.class} alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi ${alertConfig.icon} me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            
            alertContainer.insertAdjacentHTML('beforeend', alertHTML);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                const alertElement = document.getElementById(alertId);
                if (alertElement) {
                    const alert = new bootstrap.Alert(alertElement);
                    alert.close();
                }
            }, 5000);
        }

        // Load all reels data
        function loadReelsData() {
            fetch('/admin/instagram', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    reelsData = data.data || [];
                    updateTable();
                } else {
                    console.error('Failed to load reels data');
                }
            })
            .catch(error => {
                console.error('Error loading reels data:', error);
            });
        }

        // Update table with current data
        function updateTable() {
            const tableBody = document.getElementById('reelsTableBody');
            const noDataRow = document.getElementById('noDataRow');
            
            // Clear existing rows except template
            tableBody.innerHTML = '';
            
            if (reelsData.length === 0) {
                tableBody.innerHTML = `
                    <tr id="noDataRow">
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                            <div class="mt-2">Belum ada data Instagram Reels</div>
                        </td>
                    </tr>
                `;
                return;
            }
            
            reelsData.forEach((reel, index) => {
                const row = `
                    <tr data-id="${reel.id}">
                        <td class="text-center">${index + 1}</td>
                        <td>
                            <a href="${reel.url}" target="_blank" class="link link-primary text-sm break-all">
                                ${reel.url}
                            </a>
                        </td>
                        <td class="text-center">${reel.posted_at || reel.created_at}</td>
                        <td>
                            <a href="${reel.user_url || '#'}" target="_blank" class="link link-secondary">
                                ${reel.username || 'Unknown'}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-warning" onclick="editEmbed(${reel.id})">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteEmbed(${reel.id})">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        }

        // Add new reel to table without full page reload
        function addReelToTable(reel) {
            reelsData.push(reel);
            updateTable();
        }

        // Edit Functions
        function editEmbed(embedId) {
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
            
            // Fetch embed data
            fetch(`/admin/instagram/${embedId}/edit`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('editEmbedId').value = data.embed.id;
                    document.getElementById('editUrl').value = data.embed.url;
                    
                    // Format datetime for input
                    const postedAt = data.embed.posted_at || data.embed.created_at;
                    if (postedAt) {
                        const date = new Date(postedAt);
                        const formattedDate = date.toISOString().slice(0, 16);
                        document.getElementById('editPostedAt').value = formattedDate;
                    }
                } else {
                    showAlert(data.message || 'Gagal memuat data embed', 'error');
                    editModal.hide();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('Terjadi kesalahan saat memuat data', 'error');
                editModal.hide();
            });
        }

        function updateEmbed() {
            const embedId = document.getElementById('editEmbedId').value;
            const url = document.getElementById('editUrl').value;
            const postedAt = document.getElementById('editPostedAt').value;
            
            if (!url || !postedAt) {
                showAlert('Mohon lengkapi semua field', 'warning');
                return;
            }
            
            const updateButton = document.querySelector('#editModal .btn-primary');
            const originalText = updateButton.innerHTML;
            updateButton.innerHTML = '<i class="bi bi-arrow-clockwise spinner-border spinner-border-sm me-1"></i> Menyimpan...';
            updateButton.disabled = true;
            
            fetch(`/admin/instagram/${embedId}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    url: url,
                    posted_at: postedAt
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.message || 'Instagram embed berhasil diupdate', 'success');
                    bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
                    
                    // Update local data and table
                    const index = reelsData.findIndex(reel => reel.id == embedId);
                    if (index !== -1) {
                        reelsData[index] = { ...reelsData[index], url: url, posted_at: postedAt };
                        updateTable();
                    }
                } else {
                    showAlert(data.message || 'Gagal mengupdate embed', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('Terjadi kesalahan saat mengupdate data', 'error');
            })
            .finally(() => {
                updateButton.innerHTML = originalText;
                updateButton.disabled = false;
            });
        }

        // Delete Functions
        function deleteEmbed(embedId) {
            const reel = reelsData.find(r => r.id == embedId);
            const embedUrl = reel ? reel.url : 'Unknown URL';
            
            document.getElementById('deleteEmbedId').value = embedId;
            document.getElementById('deleteEmbedUrl').textContent = embedUrl;
            
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        function confirmDelete() {
            const embedId = document.getElementById('deleteEmbedId').value;
            
            const deleteButton = document.querySelector('#deleteModal .btn-danger');
            const originalText = deleteButton.innerHTML;
            deleteButton.innerHTML = '<i class="bi bi-arrow-clockwise spinner-border spinner-border-sm me-1"></i> Menghapus...';
            deleteButton.disabled = true;
            
            fetch(`/admin/instagram/${embedId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.message || 'Instagram embed berhasil dihapus', 'success');
                    bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
                    
                    // Remove from local data and update table
                    reelsData = reelsData.filter(reel => reel.id != embedId);
                    updateTable();
                } else {
                    showAlert(data.message || 'Gagal menghapus embed', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('Terjadi kesalahan saat menghapus data', 'error');
            })
            .finally(() => {
                deleteButton.innerHTML = originalText;
                deleteButton.disabled = false;
            });
        }

        // Add Form Handling
        document.addEventListener('DOMContentLoaded', function() {
            // Load initial data
            loadReelsData();
            
            const addForm = document.getElementById('addReelForm');
            if (addForm) {
                addForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const submitButton = this.closest('.modal-content').querySelector('button[type="submit"]');
                    const spinner = document.getElementById('loadingSpinner');
                    const submitText = document.getElementById('submitText');
                    
                    submitText.textContent = 'Menyimpan...';
                    spinner.classList.remove('d-none');
                    submitButton.disabled = true;
                    
                    fetch('/admin/instagram', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showAlert(data.message || 'Instagram embed berhasil ditambahkan', 'success');
                            bootstrap.Modal.getInstance(document.getElementById('tambahBlogModal')).hide();
                            this.reset();
                            
                            // Add to table without full page reload
                            if (data.data) {
                                addReelToTable(data.data);
                            } else {
                                // Fallback: reload data
                                loadReelsData();
                            }
                        } else {
                            showAlert(data.message || 'Gagal menambahkan embed', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showAlert('Terjadi kesalahan saat menambahkan data', 'error');
                    })
                    .finally(() => {
                        submitText.textContent = 'Tambah';
                        spinner.classList.add('d-none');
                        submitButton.disabled = false;
                    });
                });
            }
        });

        // Modal event listeners
        document.getElementById('editModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('editForm').reset();
        });

        document.getElementById('deleteModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('deleteEmbedId').value = '';
            document.getElementById('deleteEmbedUrl').textContent = '';
        });

        document.getElementById('tambahBlogModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('addReelForm').reset();
        });
    </script>
@endsection
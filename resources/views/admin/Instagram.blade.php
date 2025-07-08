@extends('layouts.app')

@section('title', 'Instagram')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-primary">
        Instagram Reels Manager
    </h1>

    {{-- Form Input URL --}}
    <div class="card bg-base-200 shadow-md mb-8">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">Tambah Instagram Reel Baru</h2>
            <form id="embedForm" class="space-y-4">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">Link Instagram Reel</span>
                    </label>
                    <input
                        type="url"
                        id="instagramUrl"
                        name="url"
                        placeholder="https://www.instagram.com/reel/..."
                        class="input input-bordered w-full"
                        required />
                    <label class="label">
                        <span class="label-text-alt text-info">
                            Contoh: https://www.instagram.com/reel/ABC123/
                        </span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">
                    <span
                        class="loading loading-spinner loading-sm hidden"
                        id="loadingSpinner"></span>
                    <span id="submitText">Tambah</span>
                </button>
            </form>

            <div id="alertContainer" class="mt-4 hidden"></div>
        </div>
    </div>

    {{-- Tabel daftar embed --}}
    <div class="card">
        <div class="card-body">
            <h2 class="font-bold text-lg mb-6">Daftar Instagram Reels</h2>

            <div class="overflow-x-auto">
                <table id="embedsTable" class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Link</th>
                            <th>Tanggal</th>
                            <th>User</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($embeds as $index => $embed)
                        <tr data-id="{{ $embed->id }}">
                            <td class="text-center font-bold">
                                {{ $index + 1 }}
                            </td>
                            <td>
                                <a
                                    href="{{ $embed->url }}"
                                    target="_blank"
                                    class="link link-primary text-sm break-all">
                                    {{ $embed->url }}
                                </a>
                            </td>
                            <td>{{ $embed->formatted_posted_at }}</td>
                            <td>
                                <a
                                    href="https://instagram.com/{{ $embed->username }}"
                                    target="_blank"
                                    class="link link-secondary">
                                    @{{ $embed->username }}
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="join">
                                    <button
                                        class="btn btn-sm btn-warning join-item"
                                        onclick="editEmbed({{ $embed->id }})">
                                        Edit
                                    </button>
                                    <button
                                        class="btn btn-sm btn-error join-item"
                                        onclick="deleteEmbed({{ $embed->id }})">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td
                                colspan="5"
                                class="text-center py-8 text-base-content/50">
                                Belum ada Instagram Reels yang ditambahkan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <dialog id="editModal" class="modal">
        <div class="modal-box">
            <form id="editForm" class="space-y-4" method="dialog">
                <h3 class="font-bold text-lg mb-4">Edit Instagram Embed</h3>
                @csrf
                <input type="hidden" id="editId" name="id" />

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">URL Instagram</span>
                    </label>
                    <input
                        type="url"
                        id="editUrl"
                        name="url"
                        class="input input-bordered"
                        required />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tanggal Post</span>
                    </label>
                    <input
                        type="datetime-local"
                        id="editPostedAt"
                        name="posted_at"
                        class="input input-bordered"
                        required />
                </div>

                <div class="modal-action">
                    <button type="button" class="btn" id="closeEditModal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    {{-- Delete Modal --}}
    <dialog id="deleteModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Konfirmasi Hapus</h3>
            <p class="py-4">
                Apakah Anda yakin ingin menghapus Instagram embed ini?
            </p>
            <div class="modal-action">
                <button type="button" class="btn" id="closeDeleteModal">
                    Batal
                </button>
                <button type="button" class="btn btn-error" id="confirmDelete">
                    Hapus
                </button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</div>
@endsection

@push('scripts')
<script>
    const csrfToken = "{{ csrf_token() }}";

    // Fungsi alert
    function showAlert(message, type) {
        const alertContainer = document.getElementById("alertContainer");
        alertContainer.innerHTML = `
        <div class="alert ${
            type === "success" ? "alert-success" : "alert-error"
        }">
            <span>${message}</span>
        </div>`;
        alertContainer.classList.remove("hidden");
        setTimeout(() => alertContainer.classList.add("hidden"), 4000);
    }

    // Modal references
    const editModal = document.getElementById("editModal");
    const deleteModal = document.getElementById("deleteModal");

    // Close modal buttons
    document.getElementById("closeEditModal").addEventListener("click", () => {
        editModal.close();
    });

    document
        .getElementById("closeDeleteModal")
        .addEventListener("click", () => {
            deleteModal.close();
        });

    // Form submission
    document
        .getElementById("embedForm")
        .addEventListener("submit", async function(e) {
            e.preventDefault();

            const loadingSpinner = document.getElementById("loadingSpinner");
            const submitText = document.getElementById("submitText");
            const submitButton = this.querySelector('button[type="submit"]');

            // Show loading state
            loadingSpinner.classList.remove("hidden");
            submitText.textContent = "Processing...";
            submitButton.disabled = true;

            const formData = new FormData(this);

            try {
                const response = await fetch(
                    "{{ route('instagram.store') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                            Accept: "application/json",
                        },
                        body: formData,
                    }
                );

                const result = await response.json();

                if (response.ok && result.success) {
                    showAlert(result.message, "success");
                    this.reset();

                    // Reload page or add new row to table
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    showAlert(result.message || "Terjadi kesalahan!", "error");
                }
            } catch (error) {
                console.error("Error:", error);
                showAlert("Terjadi kesalahan saat menambahkan data!", "error");
            } finally {
                // Reset loading state
                loadingSpinner.classList.add("hidden");
                submitText.textContent = "Tambah";
                submitButton.disabled = false;
            }
        });

    // Load data untuk edit
    async function editEmbed(id) {
        try {
            const response = await fetch(
                "{{ route('instagram.edit', ':id') }}".replace(":id", id), {
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        Accept: "application/json",
                    },
                }
            );

            const data = await response.json();

            if (response.ok && data.success) {
                document.getElementById("editId").value = data.embed.id;
                document.getElementById("editUrl").value = data.embed.url;
                document.getElementById("editPostedAt").value =
                    data.embed.posted_at;

                editModal.showModal();
            } else {
                showAlert(
                    data.message || "Gagal memuat data untuk edit!",
                    "error"
                );
            }
        } catch (error) {
            console.error("Error:", error);
            showAlert("Terjadi kesalahan saat memuat data!", "error");
        }
    }

    // Submit update
    document
        .getElementById("editForm")
        .addEventListener("submit", async function(e) {
            e.preventDefault();

            const id = document.getElementById("editId").value;
            const formData = new FormData();
            formData.append("_method", "PUT");
            formData.append("url", document.getElementById("editUrl").value);
            formData.append(
                "posted_at",
                document.getElementById("editPostedAt").value
            );

            try {
                const response = await fetch(
                    "{{ route('instagram.update', ':id') }}".replace(
                        ":id",
                        id
                    ), {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                            Accept: "application/json",
                        },
                        body: formData,
                    }
                );

                const result = await response.json();

                if (response.ok && result.success) {
                    showAlert(result.message, "success");
                    editModal.close();

                    // Reload page to show updated data
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    showAlert(result.message || "Terjadi kesalahan!", "error");
                }
            } catch (error) {
                console.error("Error:", error);
                showAlert("Terjadi kesalahan saat mengupdate data!", "error");
            }
        });

    // Delete flow
    let currentDeleteId = null;

    function deleteEmbed(id) {
        currentDeleteId = id;
        deleteModal.showModal();
    }

    document
        .getElementById("confirmDelete")
        .addEventListener("click", async function() {
            if (!currentDeleteId) return;

            try {
                const response = await fetch(
                    "{{ route('instagram.destroy', ':id') }}".replace(
                        ":id",
                        currentDeleteId
                    ), {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                            Accept: "application/json",
                        },
                    }
                );

                const result = await response.json();

                if (response.ok && result.success) {
                    showAlert(result.message, "success");
                    deleteModal.close();

                    // Remove table row
                    const row = document.querySelector(
                        `tr[data-id="${currentDeleteId}"]`
                    );
                    if (row) {
                        row.remove();

                        // Update row numbers
                        updateRowNumbers();
                    }

                    currentDeleteId = null;
                } else {
                    showAlert(result.message || "Terjadi kesalahan!", "error");
                }
            } catch (error) {
                console.error("Error:", error);
                showAlert("Terjadi kesalahan saat menghapus data!", "error");
            }
        });

    // Function to update row numbers after deletion
    function updateRowNumbers() {
        const rows = document.querySelectorAll("#embedsTable tbody tr");
        rows.forEach((row, index) => {
            const numberCell = row.querySelector("td:first-child");
            if (numberCell && !row.querySelector("td[colspan]")) {
                numberCell.textContent = index + 1;
            }
        });
    }
</script>
@endpush
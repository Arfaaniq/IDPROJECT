@props(['action', 'data'])

<div class="modal-dialog">
    <form id="form-action" action="{{$action}}" method="post">
        @csrf
        <!-- kalau -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Jadwal Janji Temu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
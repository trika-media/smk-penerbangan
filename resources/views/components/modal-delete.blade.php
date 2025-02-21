<div class="modal fade" id="deleteModal" wire:key="deleteModal" wire:ignore.self data-bs-backdrop="static">
    <button id="button-open-deleteModal" data-bs-toggle="modal" data-bs-target="#deleteModal" class="d-none"></button>
    <button type="button" class="d-none close-modal" data-bs-dismiss="modal"></button>

    <div class="modal-dialog modal-dialog-scrollable {{ $no_center ?? 'modal-dialog-centered' }} modal" role="document">
        <div class="modal-content" style="box-shadow: 0px 8px 0px 0px #dc3545 inset; border: 0">
            <div class="modal-body">
                <div class="d-flex flex-column align-items-center justify-content-center text-center gap-2 py-2">
                    <div style="width: 100px; height: 100px; border-radius: 50%; background: #dc3545"
                        class="d-flex justify-content-center align-items-center text-white bx-lg p-2">
                        <i class='bx bx-trash-alt bx-lg'></i>
                    </div>
                    <h4>
                        Apakah anda yakin menghapus data ini?
                    </h4>
                    <small class="text-secondary">
                        Aksi yang anda lakukan akan bersifat permanen!
                    </small>
                </div>
            </div>
            <div class="modal-footer border-0">
                <div class="d-flex gap-2 w-100">
                    <button class="btn btn-secondary w-100" wire:click="cancelDelete">
                        Batal
                    </button>
                    <button class="btn btn-danger w-100" wire:click="deleteData">
                        Lanjutkan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            closeQuery = document.querySelectorAll('.close-modal');
            buttonOpendeleteModal = document.getElementById('button-open-deleteModal');
            Livewire.on('closedeleteModal', () => {
                Array.from(closeQuery).map((item) => item.click())
            })
            Livewire.on('opendeleteModal', () => {
                buttonOpendeleteModal.click()
            })
        });
    </script>
</div>

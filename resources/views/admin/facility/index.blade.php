<div>
    <x-heading title="Fasilitas" pretitle="Master Data">
        <div>
            <button class="btn btn-success btn-icon btn-lg" data-bs-toggle="modal" data-bs-target="#modalImage"
                wire:click="$dispatch('openmodalImage')">
                <i class="bx bx-image-add bx-sm"></i>
            </button>
            <button class="btn btn-primary btn-icon btn-lg" data-bs-toggle="modal" data-bs-target="#modalCreate"
                wire:click="$dispatch('openmodalCreate')">
                <i class="bx bx-plus-circle bx-sm"></i>
            </button>
        </div>
    </x-heading>

    <x-modal key="modalImage" title="Tambah Gambar" noFooter styled>
        <x-form.filepond name="nama" />
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" wire:click="cancelEdit">
                Batal
            </button>
            <button type="button" class="btn btn-success" wire:click="saveImage">Simpan</button>
        </div>
    </x-modal>

    <x-modal key="modalCreate" :title="$edit ? 'Edit Data' : 'Tambah Data'" size="xl" styled>
        <x-form.input title="Kategori" name="kategori" wire:model="kategori" />
        <x-form.input title="Nama" name="nama" wire:model="nama" />
    </x-modal>

    <x-modal-delete />

    <div class="d-flex align-items-center mb-3">
        <div>
            <input type="text" class="form-control" placeholder="Cari Data...">
        </div>
        <x-per-page class="" />
    </div>

    <div class="card card-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 1px;">#</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th style="width: 1%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration + ($rows->firstItem() - 1) }}</td>
                        <td>{{ $row->kategori }}</td>
                        <td>
                            @if ($row->kategori == 'image')
                                <img src="{{ $row->imageUrl() }}" class="img-fluid rounded" alt="image" style="width: 10rem;" lazy/>
                            @else
                                {{ $row->nama }}
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-icon" wire:click="editMode('{{ $row->id }}')">
                                    <i class='bx bxs-edit'></i>
                                </button>
                                <button class="btn btn-danger btn-icon"
                                    wire:click="deleteSelected('{{ $row->id }}')">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <x-datatables.empty />
                @endforelse
            </tbody>
        </table>
        {{ $rows->links() }}
    </div>
</div>

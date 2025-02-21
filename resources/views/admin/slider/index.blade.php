<div>
    <x-slot name="title"> Slider Halaman Utama </x-slot>

    <x-alert />
    <x-modal-delete />

    <x-heading pretitle="Master Data" title="Slider">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
            Tambah
        </button>
    </x-heading>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <input name="search" placeholder="Cari Data..." wire:model.live="filters.search" class="form-control" />
        </div>
            <x-per-page class="" />
    </div>

    <x-modal key="modalCreate" size="xl" styled :title="$edit_id ? 'Edit Data' : 'Tambah Data'">
        <x-form.input title="Titel" name="main_title" wire:model="main_title" />
        <x-form.input title="Deskripsi" name="description_title" wire:model="description_title" />
        <x-form.filepond name="image" wire:model="image" style="width: 20rem" />
    </x-modal>

    <div class="card">
        <div class="table-responsive mb-0">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Text Overlay</th>
                        <th style="width: 1px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $key => $value)
                        <tr>
                            <td>{{ $loop->iteration + $rows->firstItem() - 1 }}</td>
                            <td>
                                <img src="{{ $value->imageUrl() }}" class="img-fluid rounded" alt=""
                                    style="width: 100px; height: 100px; object-fit: cover" />
                            </td>
                            <td>
                                {{ $value->main_title }} <br>
                                {{ $value->description }}
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-warning btn-icon" wire:click="editMode('{{ $value->id }}')">
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button class="btn btn-danger btn-icon" wire:click="deleteSelected('{{ $value->id }}')">
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
        </div>
    </div>
</div>

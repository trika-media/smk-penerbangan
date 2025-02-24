<div>
    <x-heading title="Akun" pretitle="Master Data">
        <button class="btn btn-primary btn-icon btn-lg" data-bs-toggle="modal" data-bs-target="#modalCreate"
            wire:click="$dispatch('openmodalCreate')">
            <i class="bx bx-plus-circle bx-sm"></i>
        </button>
    </x-heading>

    <x-modal key="modalCreate" :title="$edit ? 'Edit Data' : 'Tambah Data'" size="xl" styled>
        <x-form.filepond name="foto" />
        <x-form.input title="Username" name="name" wire:model="name" />
        <x-form.input title="Email" name="email" wire:model="email" />
        <x-form.input title="Password" name="password" wire:model="password" />
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
                    <th style="width: 100px;">Foto</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th style="width: 1%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration + ($rows->firstItem() - 1) }}</td>
                        <td>
                            <img src="{{ $row->imageUrl() }}" class="img-fluid rounded" />
                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
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

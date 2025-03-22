<div>
    <x-heading title="Running Text" pretitle="Master Data">
        <button class="btn btn-primary btn-icon btn-lg" data-bs-toggle="modal" data-bs-target="#modalCreate"
            wire:click="$dispatch('openmodalCreate')">
            <i class="bx bx-plus-circle bx-sm"></i>
        </button>
    </x-heading>

    <x-modal key="modalCreate" title="Tambah Data" styled>
        <x-form.input title="Text" name="text" wire:model="text" />
    </x-modal>

    <x-modal-delete />

    <x-per-page class="mb-3" />

    <div class="card card-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 1px;">#</th>
                    <th>Text</th>
                    <th style="width: 1%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->value }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-icon" wire:click="editMode('{{ $row->id }}')">
                                    <i class="bx bx-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-icon"
                                    wire:click="deleteSelected('{{ $row->id }}')">
                                    <i class="bx bx-trash"></i>
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

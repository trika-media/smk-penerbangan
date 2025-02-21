<div>
    <x-heading title="Periode Pendaftaran" pretitle="Master Data">
        <button class="btn btn-primary btn-icon btn-lg" data-bs-toggle="modal" data-bs-target="#modalCreate"
            wire:click="$dispatch('openmodalCreate')">
            <i class="bx bx-plus-circle bx-sm"></i>
        </button>
    </x-heading>

    <x-modal key="modalCreate" :title="$edit ? 'Edit Data' : 'Tambah Data'" size="xl" styled>
        <x-form.input title="Tanggal Berlaku Awal" name="tanggal_berlaku_awal" wire:model="tanggal_berlaku_awal"  type="date"/>
        <x-form.input title="Tanggal Berlaku Akhir" name="tanggal_berlaku_akhir" wire:model="tanggal_berlaku_akhir" type="date" />
        <x-form.input title="Gelombang" name="gelombang" wire:model="gelombang" placeholder="ex. 1, 2, 3" />
    </x-modal>

    <x-modal-delete />

    <div class="d-flex align-items-center mb-3">
        <div>
            <input type="text" class="form-control" placeholder="Cari Data...">
        </div>
        <x-per-page class=""/>
    </div>

    <div class="card card-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 1px;">#</th>
                    <th>Tanggal Berlaku</th>
                    <th>Gelombang</th>
                    <th style="width: 1%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                <tr>
                    <td>{{ $loop->iteration + ($rows->firstItem() - 1) }}</td>
                    <td>{{ $row->tanggal_berlaku_awal->translatedFormat("l, d F Y") }} s/d {{ $row->tanggal_berlaku_akhir->translatedFormat("l, d F Y") }}</td>
                    <td> Gelombang {{ $row->gelombang }} </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning btn-icon" wire:click="editMode('{{ $row->id }}')">
                                <i class='bx bxs-edit'></i>
                            </button>
                            <button class="btn btn-danger btn-icon" wire:click="deleteSelected('{{ $row->id }}')">
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

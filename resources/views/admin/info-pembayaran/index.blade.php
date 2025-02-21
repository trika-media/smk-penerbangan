<div>
    <x-heading title="Info Pembayaran" pretitle="Master Data">
        <button class="btn btn-primary btn-icon btn-lg" data-bs-toggle="modal" data-bs-target="#modalCreate"
            wire:click="$dispatch('openmodalCreate')">
            <i class="bx bx-plus-circle bx-sm"></i>
        </button>
    </x-heading>

    <x-modal key="modalCreate" :title="$edit ? 'Edit Data' : 'Tambah Data'" size="xl" styled>
        <x-form.input title="Deskripsi Pembayaran" name="deskripsi" wire:model="deskripsi" />
        <x-form.input title="Jumlah" name="jumlah" wire:model="jumlah" type="number" />
        <x-form.select title="Periode Pendaftaran" name="semester" wire:model="semester"> 
            <option value="" disabled>Semua</option>
            @foreach($periode_pendaftaran as $periode)
                <option value="{{ $periode->id }}">
                    {{ $periode->tanggal_berlaku_dan_gelombang }}
                </option>
            @endforeach
        </x-form.select>
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
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Semester</th>
                    <th style="width: 1%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                <tr>
                    <td>{{ $loop->iteration + ($rows->firstItem() - 1) }}</td>
                    <td>{{ $row->deskripsi }}</td>
                    <td>{{ $row->jumlah_rupiah }}</td>
                    <td>{{ $row->getSemesterProperty->tanggal_berlaku_dan_gelombang }} </td>
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
        {{ $rows->links() }}
    </div>
</div>

<div>
    <x-heading title="FAQ" pretitle="Master Data">
        <button class="btn btn-primary btn-icon btn-lg" data-bs-toggle="modal" data-bs-target="#modalCreate"
            wire:click="$dispatch('openmodalCreate')">
            <i class="bx bx-plus-circle bx-sm"></i>
        </button>
    </x-heading>

    <x-modal key="modalCreate" :title="$edit ? 'Edit Data' : 'Tambah Data'" size="xl" styled>
        <x-form.input title="Pertanyaan" name="question" wire:model="question" />
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="input-question">Jawaban</label>
            <div class="col-sm-10">
                <x-form.text-editor wire:model="answer" />
        
                <div class="invalid-feedback">
                    @error('answer')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
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
                    <th>Pertanyaan</th>
                    <th style="width: 65%">Jawaban</th>
                    <th style="width: 1%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                <tr>
                    <td>{{ $loop->iteration + ($rows->firstItem() - 1) }}</td>
                    <td>{{ $row->question }}</td>
                    <td>{!! $row->answer !!}</td>
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
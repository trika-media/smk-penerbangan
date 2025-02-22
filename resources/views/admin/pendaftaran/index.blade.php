<div>
    <x-heading title="Pendaftaran" pretitle="Master Data">
    </x-heading>

    <x-modal-delete />

    <x-per-page class="mb-3" />

    <div class="card card-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 1px;">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No.HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Mendaftar Pada</th>
                    <th style="width: 1%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->nohp }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->created_at->translatedFormat('l, d F Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-success btn-icon" wire:click="acceptData('{{ $row->id }}')"
                                    @disabled($row->accepted == 1)>
                                    <i class="bx bx-check-circle"></i>
                                </button>
                                <button class="btn btn-danger btn-icon" wire:click="declineData('{{ $row->id }}')"
                                    @disabled($row->accepted == 0)>
                                    <i class="bx bx-x-circle"></i>
                                </button>
                                @if ($row->accepted == 0)
                                    <button class="btn btn-danger btn-icon"
                                        wire:click="deleteSelected('{{ $row->id }}')">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                @endif
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

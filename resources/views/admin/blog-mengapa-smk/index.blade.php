<div>
    <x-heading title="Blog Mengapa SMK" pretitle="Master Data">
        <a class="btn btn-primary btn-icon btn-lg" href="{{ route('blog-mengapa-smk.form', 'tambah') }}">
            <i class="bx bx-plus-circle bx-sm"></i>
        </a>
    </x-heading>

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
                    <th style="width: 20%;">Titel</th>
                    <th>Gambar</th>
                    <th style="width: 55%;">Konten</th>
                    <th style="width: 1%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration + ($rows->firstItem() - 1) }}</td>
                        <td>
                            {{ $row->title }} <br>
                            Oleh : <b>{{ $row->author }}</b>
                        </td>
                        <td>
                            <img src="{{ $row->imageUrl() }}" class="img-fluid rounded" alt="" width="200" />
                        </td>
                        <td>{!! Str::words($row->konten, 50, '...') !!}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-warning btn-icon" href="{{ route('blog-mengapa-smk.form', $row->id) }}">
                                    <i class='bx bxs-edit'></i>
                                </a>
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

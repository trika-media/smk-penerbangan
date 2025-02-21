<div>
    <style>
        .img-hover {
            opacity: 0;
            transition: opacity 1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .img-hover:hover {
            opacity: 1;
        }
    </style>

    <x-heading title="Biodata Singkat" pretitle="Master Data">
    </x-heading>

    <x-modal-delete />

    <div class="card mb-3">
        <div class="card-body">
            <h3>Biodata</h3>
            <x-form.text-editor wire:model="biodata" />
            <div class="d-flex flex-column gap-2 my-3">
                <h3 class="mb-0">Gambar <small>(maks. 7 gambar)</small></h3>
                <x-form.filepond name="image" />
                <div class="row justify-content-center" style="position: relative">
                    @foreach ($image_row as $rows)
                        <div class="col-6 col-md-4 col-lg-3 p-0 text-white">
                            <div class="img-hover position-absolute bottom-0 d-flex justify-content-center align-items-center"
                                style="width: inherit; height: 100%; ;background: rgba(0, 0, 0, 0.6)">
                                <a href="{{ $rows->imageUrl() }}" style="text-decoration: none; color:white" target="_blank">
                                    <i class="bx bxs-show bx-lg"></i>
                                </a>
                                <i class="bx bxs-trash bx-lg" wire:click="deleteSelected('{{ $rows->id }}')"></i>
                            </div>
                            <img src="{{ $rows->imageUrl() }}" alt="img"
                                style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" wire:click="save">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

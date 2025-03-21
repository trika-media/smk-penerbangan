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

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left: 1rem">
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $step == 'biodata' ? 'active' : '' }}" id="biodata-tab"
                data-bs-toggle="tab" data-bs-target="#biodata" type="button" role="tab"
                aria-controls="biodata" aria-selected="{{ $step == 'biodata' ? 'true' : 'false' }}"
                wire:click="$set('step', 'biodata')">
                Profil Sekolah
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $step == 'yayasan' ? 'active' : '' }}" id="yayasan-tab"
                data-bs-toggle="tab" data-bs-target="#yayasan" type="button" role="tab"
                aria-controls="yayasan" aria-selected="{{ $step == 'yayasan' ? 'true' : 'false' }}"
                wire:click="$set('step', 'yayasan')">
                Profil Yayasan
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $step == 'guru' ? 'active' : '' }}" id="guru-tab"
                data-bs-toggle="tab" data-bs-target="#guru" type="button" role="tab"
                aria-controls="guru" aria-selected="{{ $step == 'guru' ? 'true' : 'false' }}"
                wire:click="$set('step', 'guru')">
                Profil Guru
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $step == 'extrakurikuler' ? 'active' : '' }}" id="extrakurikuler-tab"
                data-bs-toggle="tab" data-bs-target="#extrakurikuler" type="button" role="tab"
                aria-controls="extrakurikuler" aria-selected="{{ $step == 'extrakurikuler' ? 'true' : 'false' }}"
                wire:click="$set('step', 'extrakurikuler')">
                ExtraKurikuler
            </button>
        </li>
    </ul>
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="text-capitalize">Profil {{ str_replace('-', ' ', $step) }}</h3>
            <x-form.text-editor wire:model="biodata" />
            <div class="d-flex flex-column gap-2 my-3">
                <h3 class="mb-0">Gambar <small>(maks. 7 gambar)</small></h3>
                <x-form.filepond name="image" />
                <div class="row justify-content-center" style="position: relative">
                    @forelse ($image_row as $rows)
                        <div class="col-6 col-md-4 col-lg-3 p-0 text-white">
                            <div class="img-hover position-absolute bottom-0 d-flex justify-content-center align-items-center"
                                style="width: inherit; height: 100%; ;background: rgba(0, 0, 0, 0.6)">
                                <a href="{{ $rows->imageUrl() }}" style="text-decoration: none; color:white"
                                    target="_blank">
                                    <i class="bx bxs-show bx-lg"></i>
                                </a>
                                <i class="bx bxs-trash bx-lg" wire:click="deleteSelected('{{ $rows->id }}')"></i>
                            </div>
                            <img src="{{ $rows->imageUrl() }}" alt="img"
                                style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                    @empty
                        <x-datatables.empty />
                    @endforelse
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

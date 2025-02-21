<div>
    <x-heading title="Kustomisasi Page Alasan Memilih" pretitle="Alasan Memilih">
    </x-heading>

    <div class="card mb-3">
        <div class="card-body">
            <x-form.input title="Title" name="title" wire:model.live="title" placeholder="Murah Dan Bagus" />
            <x-form.input title="URL Pendaftaran" name="url_pendaftaran" wire:model.live="url_pendaftaran" placeholder="https://youtube.com" />
            <x-form.text-area title="Ringkasan" name="ringkasan" wire:model.live="ringkasan" />
            <x-filepond::upload wire:model="image" />
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0">List Alasan</h5>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary btn-icon" wire:click="decrease" @disabled($jum_list == 1)>
                        <i class="bx bx-minus-circle bx-sm"></i>
                    </button>
                    <button class="btn btn-outline-primary btn-icon" wire:click="increase" @disabled($jum_list >= 15)>
                        <i class="bx bx-plus-circle bx-sm"></i>
                    </button>
                </div>
            </div>
            @for($i = 1; $i <= $jum_list; $i++)
                <x-form.input title="Alasan {{ $i }}" name="lists.{{ $i }}" placeholder="masukkan alasan disini" wire:model.live="lists.{{ $i }}" />
            @endfor
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" wire:click="save">Simpan</button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5>Preview</h5>
            <h1 class="mb-5 text-center">
                <b>Kenapa</b> Anda Harus Memilih <b>SMK Penerbangan</b>?
            </h1>

            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <p class="mb-0 display-4">
                                <b>{{ $title }}</b>
                            </p>
                            <ul class="my-3">
                                @for ($i = 1; $i <= $jum_list; $i++)
                                    <li>
                                        {{ array_key_exists($i, $lists) ? $lists[$i] : '' }}
                                    </li>
                                @endfor
                            </ul>
                            <p class="mb-2">
                                <b>{{ $ringkasan }}</b>
                            </p>
                            <a class="btn btn-primary" href="{{ $url_pendaftaran }}">
                                <i class="bx bxs-news me-3"></i> FORM PENDAFTARAN
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <img src="{{ $this->image ? $this->image : asset('students.jpg') }}" class="img-fluid rounded" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

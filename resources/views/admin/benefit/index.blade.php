<div>
    <x-heading title="Kustomisasi Page Keunggulan" pretitle="Keunggulan">
    </x-heading>

    <div class="card mb-3">
        <div class="card-body">
            <x-form.input title="Title" name="title" wire:model.live="title" placeholder="Murah Dan Bagus" />
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
            @for ($i = 1; $i <= $jum_list; $i++)
                <x-form.input title="Alasan {{ $i }}" name="lists.{{ $i }}"
                    placeholder="masukkan alasan disini" wire:model.live="lists.{{ $i }}" />
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
                Yang Akan Anda Dapatkan Di <b>{{ config_get('APP_NAME') }}</b>
            </h1>
            <div class="row" style="row-gap: 1rem">
                <div class="col-12 col-lg-8">
                    <div class="card border-0 shadow" data-aos="fade-left">
                        <div class="card-body">
                            <p class="fs-2 mb-0">
                                <b>{{ $title ?? 'Keunggulan ' . config_get('APP_NAME') }}</b>
                            </p>
                            <ul class="my-3">
                                @for ($i = 1; $i <= $jum_list; $i++)
                                    <li class="mb-2">
                                        {{ array_key_exists($i, $lists) ? $lists[$i] : 'Whitespace' }}
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card border-0 shadow" data-aos="fade-right">
                        <div class="card-body">
                            @if ($image)
                                @if (filter_var($image))
                                    <img src="{{ $image }}" class="img-fluid rounded" alt="image" />
                                @else
                                    <img src="{{ $image->getRealPathUrl() }}" class="img-fluid rounded" alt="image" />
                                @endif
                            @else
                                <img src="{{ asset('students.jpg') }}" class="img-fluid rounded" alt="image" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

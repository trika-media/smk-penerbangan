<div>
    <x-heading title="Berita" pretitle="Master Data">
        <a class="btn btn-secondary btn-icon btn-lg" href="{{ route('berita.index') }}">
            <i class="bx bx-left-arrow-alt bx-sm"></i>
        </a>
    </x-heading>

    <div class="card">
        <div class="card-body">
            <h5>{{ $id == 'tambah' ? "Tambah" : "Edit" }} Data</h5>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-image">Gambar (Optional)</label>
                <div class="col-sm-10">
                    <x-form.filepond name="image_header" />
                </div>
            </div>
            <x-form.input title="Titel" name="title" wire:model.live="title" />
            <x-form.input title="Slug" name="slug" wire:model="slug" readonly />
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="input-konten">Konten</label>
                <div class="col-sm-10">
                    <x-form.text-editor wire:model="konten" />
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <div class="btn btn-success" wire:click="save">
                    Simpan
                </div>
            </div>
        </div>
    </div>
</div>

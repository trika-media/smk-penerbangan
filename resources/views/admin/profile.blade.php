<div>
    <x-heading title="Profile">
    </x-heading>

    <div class="card">
        <div class="card-body">
            <div class="d-flex gap-2 align-items-center mb-3">
                <img src="{{ auth()->user()->imageUrl() }}" class="img-fluid rounded-circle" alt=""
                    style="width: 100px; height: 100px;" />
                <div class="d-flex flex-column justify-content-center">
                    <small class="text-secondary">
                        {{ auth()->user()->email }}
                    </small>
                    <h3 class="mb-2">{{ auth()->user()->name }}</h3>
                    <small class="text-secondary">
                        Akun dibuat pada : {{ auth()->user()->created_at->translatedFormat('d F Y H:i:s') }}
                    </small>
                </div>
            </div>

            <hr>

            <div>
                <small class="text-secondary">
                    Kosongkan apabila tidak ingin di ubah!
                </small>
                <x-form.filepond name="foto" />
                <x-form.input title="Username" name="name" wire:model="name" />
                <x-form.input title="Email" name="email" wire:model="email" />
                <x-form.input title="Password" name="password" wire:model="password"
                    note="<small class='text-secondary'>
                    Kosongkan apabila tidak ingin di ubah!
                </small>" />
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn btn-success" wire:click="save">Simpan</button>
        </div>
    </div>
</div>

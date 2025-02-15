<div>
    <div
        wire:loading
        class="w-100"
    >
        <div class="w-100 d-flex justify-content-center">
            <div
                class="spinner-border text-primary text-center"
                role="status"
            >
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div wire:loading.remove>
        @if ($state == 'display')
            <div
                type="button"
                class="form-control-plaintext"
                x-on:click="$wire.$set('state', 'edit')"
            >{{ $value }}</div>
        @else
            <div class="form-group">
                <input
                    x-data=""
                    x-init="$root.focus()"
                    class="form-control @error($name) is-invalid @enderror"
                    id="input-{{ $name }}"
                    type="{{ isset($type) ? $type : 'text' }}"
                    wire:model="value"
                    x-on:blur="$wire.save()"
                    x-on:keydown.enter="$wire.save()"
                    x-on:keydown.escape="$wire.save()"
                    wire:loading.attr="disabled"
                    placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
                    autofocus
                    autocomplete="false"
                >

                <div class="invalid-feedback">
                    @error($name)
                        {{ $message }}
                    @enderror
                </div>
            </div>
        @endif
    </div>
</div>

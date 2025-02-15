<div>
    <div class="form-check">
        <input
            class="form-check-input"
            id="input-{{ $name }}"
            type="checkbox"
            wire:model="value"
            x-on:blur="$wire.save()"
            wire:loading.attr="disabled"
            {{ $value ? 'checked' : '' }}
        >

        <label
            class="form-check-label"
            for="input-{{ $name }}"
        ></label>
    </div>
</div>

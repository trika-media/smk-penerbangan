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
            >{{ $text }}</div>
        @else
            <div class="form-group">
                <div wire:ignore>
                    <select
                        class="form-control select2"
                        id="input-select2-{{ $peopleId }}-{{ str_replace('.', '-', $name) }}"
                        style="width: 100%"
                        wire:model="value"
                        wire:loading.attr="disabled"
                        autofocus
                    >
                        <option
                            value=""
                            selected
                        >Pilih</option>
                        @foreach ($options as $option)
                            <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="invalid-feedback">
                    @error($name)
                        {{ $message }}
                    @enderror
                </div>
            </div>
        @endif
    </div>
</div>

@script
    <script>
        Livewire.on('render-select2.{{ $name }}.{{ $peopleId }}', () => {
            setTimeout(() => {
                $('#input-select2-{{ $peopleId }}-{{ str_replace('.', '-', $name) }}').select2();
                $('#input-select2-{{ $peopleId }}-{{ str_replace('.', '-', $name) }}').select2(
                    'open');
                $('#input-select2-{{ $peopleId }}-{{ str_replace('.', '-', $name) }}').on(
                    'select2:close',
                    function(event) {
                        let text = $(
                            '#input-select2-{{ $peopleId }}-{{ str_replace('.', '-', $name) }} option:selected'
                        ).text();

                        $wire.save(event.target.value, text)
                    });

                $('#input-select2-{{ $peopleId }}-{{ str_replace('.', '-', $name) }}').on('change',
                    function(event) {
                        let text = $(
                            '#input-select2-{{ $peopleId }}-{{ str_replace('.', '-', $name) }} option:selected'
                        ).text();
                        $wire.save(event.target.value, text);
                    });
            }, 100);
        });
    </script>
@endscript

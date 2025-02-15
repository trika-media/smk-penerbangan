<div class="form-group">
    @if (isset($title))
    <label
        class="form-label"
        for="input-select-{{ $name }}">{{ $title }}</label>
    @endif
    <div wire:ignore>
        <select
            class="form-control select2"
            id="input-select2-{{ $this->getId() }}"
            wire:model="value">
            <option
                value=""
                selected
                @if (!$showAll) disabled @endif>{{ $showAll ? 'Semua' : 'Pilih' }}</option>
            @foreach ($options as $option)
            <option value="{{ $option['id'] }}">{{ $option['nama'] }}</option>
            @endforeach
        </select>
    </div>
</div>

@script
<script>
    $(document).ready(function() {
        $('#input-select2-{{ $this->getId() }}').select2();
        $('#input-select2-{{ $this->getId() }}').on('change', function(event) {
            $wire.$set('value', event.target.value)
        })
    });
</script>
@endscript
<div class="row mb-3">
    @if ($title)
    <label
        class="col-sm-2 col-form-label"
        for="input-select-{{ $name }}">{{ $title }}</label>
    @endif
    <div class="col-sm-10">
        <div wire:ignore>
            <select
                class="form-control w-100 select2"
                id="input-select2-{{ $this->getId() }}"
                wire:model="value"
                {{ isset($multiple) ? 'multiple' : '' }}>
                <option
                    value=""
                    selected>{{ $showAll ? 'Semua' : $optionSelect }}</option>
                @foreach ($options as $option)
                <option value="{{ $option['id'] }}">{{ $option['nama'] }}</option>
                @endforeach
            </select>
        </div>

        <p class="mb-0 mt-1">{!! isset($note) ? $note : '' !!}</p>
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
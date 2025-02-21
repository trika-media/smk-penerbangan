<div class="d-block {{ $class ?? "mb-3" }}" style="margin: 0 0 0 auto; width: 100px">
    <select class="form-select form-control" wire:model="perPage">
        @for ($i = 5; $i <= 50; $i += 5)
            <option value="{{ $i }}">
                {{ $i }}
            </option>
        @endfor
    </select>
</div>
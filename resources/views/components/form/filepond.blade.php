<x-filepond::upload wire:model="{{ $name ?? '' }}" required />
<small>
    File Type : png, jpeg, jpg dan Maks 2MB
</small>
@error($name)
    <small class="text-danger">
        {{ $message }}
    </small>
@enderror

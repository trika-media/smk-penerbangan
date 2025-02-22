<x-filepond::upload wire:model="{{ $name ?? '' }}" required />
@if(isset($no_helper))
<small>
    File Type : png, jpeg, jpg dan Maks 2MB
</small>
@endif
@error($name)
    <small class="text-danger">
        {{ $message }}
    </small>
@enderror

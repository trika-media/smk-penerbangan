<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="textarea-{{ $name }}">{{ $title }}</label>
    <div class="col-sm-10">
        <textarea class="form-control" @error($name) is-invalid @enderror id="textarea-{{ $name }}" {{ $attributes }}></textarea>
        <div class="invalid-feedback">
            @error($name)
                {{ $message }}
            @enderror
        </div>

        <p class="mb-0 mt-1">{!! isset($note) ? $note : '' !!}</p>
    </div>
</div>

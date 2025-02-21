<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        @isset($pretitle)
            <p class="mb-2 fs-5">{{ $pretitle ?? '' }}</p>
        @endisset
        <h3 class="mb-0">
            {{ $title ?? '' }}
        </h3>
    </div>
    {{ $slot }}
    {{-- <div class="d-flex gap-2">
    </div> --}}
</div>

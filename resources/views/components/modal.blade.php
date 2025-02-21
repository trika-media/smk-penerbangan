<div wire:ignore>
    <button class="btn-open visually-hidden" data-bs-toggle="modal" data-bs-target="#{{ $key }}"></button>
    <div class="modal fade" id="{{ $key }}" tabindex="-1"
        @isset($static) data-bs-backdrop="static" @endisset data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered @isset($size) modal-{{ $size ?? 'sm' }} @endisset"
            role="document">
            <div class="modal-content">
                @isset($styled)
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            {{ $title ?? 'Modal Title' }}
                        </h5>
                        <button data-bs-dismiss="modal" class="btn-close visually-hidden"></button>
                    </div>
                    <div class="modal-body">
                        {{ $slot }}
                    </div>
                    @if (!isset($noFooter))
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                wire:click="cancelEdit">
                                Batal
                            </button>
                            <button type="button" class="btn btn-success" wire:click="save">Simpan</button>
                        </div>
                    @endif
                @else
                    {{ $slot }}
                @endisset
            </div>
        </div>
    </div>

    @push('script')
        <script>
            let btnClose = document.querySelectorAll('.btn-close');
            let btnOpen = document.querySelectorAll('.btn-open');
            document.addEventListener('livewire:init', () => {
                Livewire.on('open' + '{{ $key }}', () => {
                    btnOpen.forEach(element => {
                        element.click();
                    });
                });
                Livewire.on('close' + '{{ $key }}', () => {
                    btnClose.forEach(element => {
                        element.click();
                    });
                });
            });
        </script>
    @endpush
</div>

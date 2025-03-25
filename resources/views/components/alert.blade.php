<div>
    <div style="right:0; bottom: 0; position:fixed; z-index: 99999999" class="d-flex justify-content-center me-4 mb-4">
        <span class="p-3 rounded-2 slideLeft bg-dark text-white" id="loading-indicator" style="opacity: 0">
            <i class="bx bx-sync" style="font-size: 2rem"></i>
        </span>

        <span class="p-3 rounded-2 slideLeft bg-dark text-white" id="loading-indicator" wire:offline>
            <i class="bx bx-wifi-off me-2"></i> Anda sedang offline.
        </span>
    </div>

    <script src="{{ asset('vendor/libs/animejs/anime.min.js') }}"></script>

    @if (session('alert'))
        @push('script')
            <script>
                let type = "{{ session('alert')['type'] }}"

                switch (type) {
                    case "success":
                        toastr.success('{{ session('alert')['detail'] }}', '{{ session('alert')['message'] }}')
                        break;
                    case "danger":
                        toastr.error('{{ session('alert')['detail'] }}', '{{ session('alert')['message'] }}')
                        break;
                    case "info":
                        toastr.info('{{ session('alert')['detail'] }}', '{{ session('alert')['message'] }}')
                        break;
                    case "warning":
                        toastr.warning('{{ session('alert')['detail'] }}', '{{ session('alert')['message'] }}')
                        break;
                    default:
                        break;
                }
            </script>
        @endpush
    @endif

    @push('script')
        <script>
            Livewire.on('alert', event => {
                let type = event[0].type;
                switch (type) {

                    case "success":
                        toastr.success(event[0].detail, event[0].message)
                        break;
                    case "danger":
                        toastr.error(event[0].detail, event[0].message)
                        break;
                    case "info":
                        toastr.info(event[0].detail, event[0].message)
                        break;
                    case "warning":
                        toastr.warning(event[0].detail, event[0].message)
                        break;

                    default:
                        break;
                }
            });
            Livewire.hook('request', ({
                respond
            }) => {
                anime({
                    targets: '.slideLeft',
                    opacity: 1,
                    easing: 'spring(1, 80, 10, 0)'
                });
                respond(() => {
                    anime({
                        targets: '.slideLeft',
                        opacity: 0,
                        easing: 'spring(1, 80, 10, 0)'
                    });
                })
            })
        </script>
    @endpush
</div>

<div class="row mb-3">
    <div wire:ignore>
        <select
            class="form-control w-100 select2"
            id="input-select2-{{ $this->getId() }}"
            style="height: 100px"
            wire:model="value">

            @if($semua)
            <option data-id="0" value="0">SDGs Desa</option>
            @endif

            @foreach($options as $index => $item)
            <option data-id="{{ $index }}" value="{{ $index }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <style>
        .select2-container .select2-selection--single {
            height: 75px !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-top: 6px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 22px !important;
        }
    </style>
</div>


@script
<script>
    $(document).ready(function() {
        // let options = $wire.$get('options')
        // for (let i in Object.keys(options)) {
        //     console.log(options[i]);
        // }

        function selectImage(opt) {
            if (!opt.id) {
                return opt.text;
            }

            let elm = opt.element;
            let text = `<div class="d-flex align-items-center">
                <img height="60px" src="/sdgs/${elm.getAttribute('data-id')}.png" class="userPic" /> 
                <span style="font-size: 1rem; max-width: 150px" class="ms-3">${opt.text}</span> 
            </div>`;
            return $(text);
        };

        $('#input-select2-{{ $this->getId() }}').select2({
            templateResult: selectImage,
            templateSelection: selectImage
        });
        $('#input-select2-{{ $this->getId() }}').on('change', function(event) {
            $wire.$set('value', event.target.value)
        })
    });
</script>
@endscript
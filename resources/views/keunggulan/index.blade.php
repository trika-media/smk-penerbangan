<div>
    <div class="py-3">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Kenggulan Yang Akan Anda Dapatkan Di <b>{{ config_get('APP_NAME') }}</b>
            </h1>
            <div class="row" style="row-gap: 1rem">
                <div class="col-12">
                    <div class="card border-0 shadow" data-aos="fade-left">
                        <div class="card-body">
                            <ul class="my-3">
                                @for ($i = 1; $i <= count($benefit_memilih?->lists ?? []); $i++)
                                    <li class="mb-2">
                                        {{ array_key_exists($i, $benefit_memilih?->lists) ? $benefit_memilih?->lists[$i] : 'Whitespace' }}
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

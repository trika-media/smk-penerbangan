<div>
    <section class="py-5 px-4">
        <h2 class="text-center display-2">Profil {{ config_get('APP_NAME') }}</h2>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <p>
                    {!! $biodata->where('type', 'biodata')->first()->value !!}
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                @foreach ($biodata->where('type', 'biodata_image') as $snake)
                <img src="{{ $snake->imageUrl() }}" class="w-100 d-block"
                    style="height: 20rem; object-fit: cover" />
                @endforeach
            </div>
        </div>
    </section>
</div>

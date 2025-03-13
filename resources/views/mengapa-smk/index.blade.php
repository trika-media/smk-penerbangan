<div>
    <section class="py-5 bg-dark bg-opacity-75" id="features">
        <div class="container px-5 my-5 text-white" data-aos="fade-left">
            <h1 class="mb-5 text-center">
                <b>Mengapa SMK?</b>
            </h1>
        </div>
    </section>

    <section class="py-3" id="features">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Berita
            </h1>

            <div class="row mb-3" style="row-gap: 1rem">
                @foreach ($rows as $row)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100">
                            <img style="height: 10rem; object-fit: cover;" class="w-100"
                                src="{{ $row->imageUrl() }}" />
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title">
                                    <a class="text-decoration-none text-black"
                                        href="{{ route('berita', $row->slug) }}">
                                        <b>{{ $row->title }}</b>
                                    </a>
                                </h5>
                                <small>
                                    {!! Str::words($row->konten, 30, '...') !!}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

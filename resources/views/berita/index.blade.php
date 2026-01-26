<div>
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
                                        href="{{ route('berita.detail', $row->slug) }}">
                                        <b>{{ $row->title }}</b>
                                    </a>
                                </h5>
                                <small>
                                    {{ Str::words(strip_tags($row->konten), 30, '...') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
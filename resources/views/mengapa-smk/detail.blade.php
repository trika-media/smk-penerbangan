<div class="px-5 py-3">
    <h2 class="display-3 text-center">
        <b>{{ $berita?->title }}</b>
    </h2>
    <img src="{{ $berita?->imageUrl() }}" class="img-fluid rounded" alt=""
        style="width: 100%; height: 30rem; object-fit: cover" />
    <div class="row mt-3" style="row-gap: 1rem">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column gap-2">
                        <h2>{{ $berita?->title }}</h2>
                        {!! $berita?->konten !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg">
            <div class="card border-0 shadow">
                <ul class="list-group list-group-flush">
                    @foreach ($available_berita as $a)
                        <li class="list-group-item">
                            <div class="d-flex gap-2">
                                <img style="height: 5rem; object-fit: cover; width: 5rem" class="rounded"
                                    src="{{ $a?->imageUrl() }}" />
                                <div class="d-flex flex-column">
                                    <h5 class="card-title">
                                        <a class="text-decoration-none text-black"
                                            href="{{ route('mengapa-smk.detail', $a?->slug) }}">
                                            <b>{{ $a?->title }}</b>
                                        </a>
                                    </h5>
                                    <small>
                                        {!! Str::words($a?->konten, 20, '...') !!}
                                    </small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
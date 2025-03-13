<div>
    <section class="py-5 bg-dark bg-opacity-75" id="features">
        <div class="container px-5 my-5 text-white" data-aos="fade-left">
            <h1 class="mb-5 text-center">
                <b>Jurusan (Kompetensi Keahlian)</b>
            </h1>
        </div>
    </section>

    <section class="py-3 px-5">
        <div class="row justify-content-center" style="row-gap: 1.2rem">
            @foreach ($jurusan as $jur)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100">
                        <img style="height: 10rem; object-fit: cover;" class="w-100" src="{{ $jur->imageUrl() }}" />
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $jur->nama }}</h5>
                            <p class="mb-0">
                                {!! Str::words($jur->deskripsi, 20, '...') !!}
                            </p>
                            <a href="{{ route('jurusan.profil', $jur->id) }}" class="btn btn-outline-primary mt-3 py-2">
                                Lihat Selengkapnya
                                <i class="bx bx-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

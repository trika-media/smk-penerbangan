<div>
    <section>
        <img src="{{ $data->imageUrl() }}" class="w-100 position-absolute"
            style="object-fit: cover; height: 25rem; filter: brightness(50%)">
        <div class="d-flex justify-content-center align-items-center text-white" data-aos="fade-left"
            style="height: 25rem">
            <h1 class="mb-5 text-center">
                <b>{{ $data->nama }}</b> <br>
                ({{ inisial($data->nama) }})
            </h1>
        </div>
    </section>

    <section class="py-5 px-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <h3>Apa itu {{ $data->nama }}?</h3>
                {!! $data->deskripsi !!}
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header bg-transparent p-3">
                        <h4 class="mb-0"><b>Jurusan Lainnya</b></h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($jurusan as $val)
                            <li class="list-group-item">
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ $val->imageUrl() }}" class="img-fluid rounded" alt=""
                                        style="width: 5rem; height: 5rem;object-fit: cover" />
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('jurusan.profil', $val->id) }}"
                                            class="text-decoration-none text-black">
                                            {{ $val->nama }}
                                        </a>
                                        <small>
                                            {!! Str::words($val->deskripsi, 10, '...') !!}
                                        </small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

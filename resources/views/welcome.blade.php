<div>
    {{-- Carousel --}}
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @for ($order = 0; $order < count($slider); $order++)
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $order }}"
                    class="{{ $order == 0 ? 'active' : '' }}"></button>
            @endfor
        </div>
        <div class="carousel-inner">
            @php($k = 0)
            @foreach ($slider as $slide)
                <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ $slide->imageUrl() }}" alt="First slide"
                        style="object-fit: cover; height: 70vh;" />
                    <div
                        class="carousel-caption d-none d-md-flex flex-column align-items-center justify-content-center h-100">
                        <!--<h1>{{ $slide->main_title }}</h1>-->
                        <!--<p style="font-size: 1.2rem; width: 50%;">-->
                        <!--    {{ $slide->description }}-->
                        <!--</p>-->
                    </div>
                </div>
                @php($k++)
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <section class="py-3 bg-opacity-75" id="features" style="background: #608BC1">
        <div class="container px-5 my-5" data-aos="fade-right">
            <h1 class="mb-5 text-center text-white">
                <b>Kenapa</b> Anda Harus Memilih <b>SMK Penerbangan</b>?
            </h1>

            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <p class="mb-0 display-4">
                                <b>{{ $alasan_memilih?->title ?? 'Placeholder' }}</b>
                            </p>
                            <ul class="my-3">
                                @for ($i = 1; $i <= count($alasan_memilih?->lists ?? []); $i++)
                                    <li>
                                        {{ array_key_exists($i, $alasan_memilih?->lists) ? $alasan_memilih?->lists[$i] : '' }}
                                    </li>
                                @endfor
                            </ul>
                            <p class="mb-2">
                                <b>{{ $alasan_memilih?->ringkasan ?? 'Placeholder' }}</b>
                            </p>
                            <a class="btn btn-primary" href="{{ $alasan_memilih?->url_pendaftaran ?? '#' }}">
                                <i class="bx bxs-news me-3"></i> FORM PENDAFTARAN
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <img src="{{ $alasan_memilih?->image ? $alasan_memilih->imageUrl() : asset('students.jpg') }}"
                                class="img-fluid rounded" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3" id="jurusan" data-aos="fade-up">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Jurusan
            </h1>

            <div class="row justify-content-center" style="row-gap: 1.2rem">
                @foreach ($jurusan as $jur)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100">
                            <img style="height: 10rem; object-fit: cover;" class="w-100"
                                src="{{ $jur->imageUrl() }}" />
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title">{{ $jur->nama }}</h5>
                                {!! Str::words($jur->deskripsi, 20, '...') !!}
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-outline-primary mt-3 py-2 w-100">
                                    Lihat Selengkapnya
                                    <i class="bx bx-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-3 bg-dark bg-opacity-75" id="features">
        <div class="container px-5 my-5 text-white" data-aos="fade-left">
            <h1 class="mb-5 text-center">
                <b>SISTEM PENERIMAAN MURID BARU</b>
                <br>
                <b>TA {{ $info_pembayaran?->tahun_ajar }}</b>
            </h1>

            <div class="row align-items-baseline" style="row-gap: 1.2rem">
                <div class="col-12 col-lg">
                    <h3 class="text-center"> RINCIAN BIAYA PENDAFTARAN <br> SPMB {{ $info_pembayaran?->tahun_ajar }}
                    </h3>
                    <p class="text-center mb-0 fs-3 text-uppercase">GELOMBANG {{ $info_pembayaran?->gelombang }} <br>
                        {{ $info_pembayaran?->tanggal_berlaku }}</p>
                    <table class="table table-borderless table-dark table-hover my-2">
                        <thead>
                            <tr>
                                <th style="width: 70%">Deksripsi</th>
                                <th style="width: 30%">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($tot_harga = 0)
                            @foreach ($detail_pembayaran as $pembayaran)
                                <tr>
                                    <td> {{ $pembayaran?->deskripsi }} </td>
                                    @php($tot_harga += $pembayaran?->jumlah)
                                    <td>{{ $pembayaran?->jumlah_rupiah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="bg-light text-black">Total Biaya</th>
                                <th class="bg-light text-black">Rp. {{ number_format($tot_harga, 0, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                    <p class="mb-0">
                        <b>Keterangan Tambahan</b>
                    </p>
                </div>
                {{-- <div class="col-12 col-lg">
                    <h3 class="text-center"> DETAIL INFORMASI </h3>
                    <div class="d-flex justify-content-center align-items-center flex-column gap-2">
                        <button class="card h-100">
                            <div class="card-body">
                                Daftar Sekarang
                            </div>
                        </button>
                        <button class="btn btn-success">
                            <i class="bx bxl-whatsapp me-3"></i> 0854-6790-0879
                        </button>
                        <button class="btn btn-light">
                            <i class="bx bxs-send me-3"></i> Lanjutkan Di WhatsApp
                        </button>
                        <button class="btn btn-primary">
                            <i class="bx bxs-news me-3"></i> Form Pendaftaran
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="py-3" id="jurusan" data-aos="fade-up">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Fasilitas
            </h1>

            <div class="row justify-content-center" style="row-gap: 1.2rem">
                <div class="col-12">
                    <div class="row p-0">
                        @foreach ($fasilitas->where('kategori', 'image') as $fasilito)
                            <div class="col-6 col-md-4 col-lg-2 p-0">
                                <img style="height: 10rem; object-fit: cover;" class="w-100"
                                    src="{{ $fasilito->imageUrl() }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center p-0">
                        @foreach ($fasilitas->where('kategori', '!=', 'image')->groupBy('kategori') as $key => $fasilito)
                            <div class="col-6 col-md-4 p-0">
                                <h4>{{ $key }}</h4>
                                <ul>
                                    @foreach ($fasilito as $fa)
                                        <li>
                                            {{ $fa->nama }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-gradient bg-danger bg-opacity-75" id="profil">
        <div class="container px-5 my-5">
            {{-- <h1 class="mb-5 text-center">
                Pengumuman <b>PMB</b>
            </h1> --}}

            {{-- <div class="row" style="row-gap: 1rem">
                @for ($i = 0; $i <= 8; $i++)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100">
                            <img style="height: 10rem; object-fit: cover;" class="w-100"
                                src="https://pilm.ac.id/wp-content/uploads/2023/03/Slider-TLI.png" />
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title">Pengumuman {{ $i }}</h5>
                                <small>
                                    {{ substr('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi veniam vitae quo eius odit. Quia sequi animi, sapiente, quis modi reiciendis voluptas, sed perspiciatis consectetur unde quasi eius! Consequatur dicta magnam dignissimos corrupti voluptates perspiciatis, dolore harum vitae provident eaque ut rem? Rerum provident ab harum itaque optio! Minima a sint adipisci quae non aliquam nostrum vero veniam, deserunt, esse maiores, tenetur excepturi labore fugit magni explicabo? Quae vero nihil nulla aperiam cumque quia enim iure rerum, sit tempora eius, ea quam, culpa delectus tenetur? Laudantium, corrupti minima, quos sint voluptas maxime obcaecati deserunt suscipit nobis fugit molestiae itaque ut error reiciendis dignissimos officiis dolorem aliquid dolor aperiam optio atque esse eius repellat. Id quasi corrupti neque maxime culpa veniam nostrum eius corporis iste, vero, odit modi quae esse placeat nemo dolore tempora nesciunt reiciendis repellendus quia. Natus eum odit tempore laudantium non suscipit sapiente, doloribus rerum reiciendis facilis laboriosam magnam dolore harum error hic facere saepe cum earum quia fugiat praesentium autem molestias quaerat. Aspernatur voluptas blanditiis quisquam aut expedita sequi magnam error saepe, rerum ex veniam, enim laboriosam vitae quas quo, dolorum recusandae facere dignissimos. Amet et eum cumque suscipit earum qui labore doloremque, odit, consequatur, sed a quas nihil perspiciatis? Explicabo iste odio rerum blanditiis dicta commodi minus magni. Commodi error quia modi ducimus reiciendis ratione accusamus veniam, esse dolor, fugiat corporis, voluptas facere ex? Obcaecati, eveniet similique! Voluptates ab possimus dolore? Saepe consequuntur quis, provident tempora eligendi exercitationem nesciunt eius repudiandae corrupti asperiores, ex, iure voluptatem vitae cumque rem? Cupiditate in, minus alias, ipsam laudantium dicta impedit fugiat necessitatibus architecto rerum provident quod magni sed aliquid illo quasi eveniet error saepe amet exercitationem. Deserunt vel possimus quisquam. Quas quo ipsa praesentium obcaecati, repudiandae nobis quibusdam sed exercitationem similique necessitatibus rem minima. Porro ipsum praesentium deserunt facilis.',0,100) . '...' }}
                                </small>
                                <br>
                                <a href="https://tarramatekkeng.desa.id/statistik"
                                    class="btn btn-outline-primary mt-3 py-2">
                                    Baca Selengkapnya
                                    <i class="bx bx-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div> --}}

            <div class="row align-items-center text-white" style="row-gap: 1.2rem">
                <div class="col-12 col-lg-7">
                    <p class="mb-1 display-5">
                        <b>{{ config_get('APP_NAME') }}</b>
                    </p>
                    <p>
                        
                    </p>
                </div>
                <div class="col-12 col-lg" data-aos="fade-right">
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @php($i = 0)
                            @foreach ($biodata->where('type', 'biodata_image') as $snake)
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                    <img src="{{ $snake->imageUrl() }}" class="w-100 d-block"
                                        style="height: 20rem; object-fit: cover" />
                                </div>
                                @php($i++)
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-3" id="features">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Yang Akan Anda Dapatkan Di <b>{{ config_get('APP_NAME') }}</b>
            </h1>
            <div class="row align-items-center" style="row-gap: 1rem">
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow" data-aos="fade-left">
                        <div class="card-body">
                            <p class="fs-2 mb-0">
                                <b>{{ $benefit_memilih?->title ?? 'Keunggulan ' . config_get('APP_NAME') }}</b>
                            </p>
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
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow" data-aos="fade-right">
                        <div class="card-body">
                            <img src="{{ $benefit_memilih?->imageUrl() ? $benefit_memilih->imageUrl() : asset('students.jpg') }}"
                                class="img-fluid rounded" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-gradient bg-info bg-opacity-50" id="features">
        <div class="container px-5 my-5">
            <div class="row align-items-center">
                <div class="col-12 col-lg-9">
                    <h3>UJI KOMPETENSI ANDA!</h3>
                    <h3>BUKTIKAN KEBOLEHAN ANDA, DAN JADILAH PROFESSIONAL</h3>
                    <h3>LEMBAGA SERTIFIKASI PROFESI (LSP)</h3>
                    <h3>SMK PENERBANGAN EA</h3>
                </div>
                <div class="col-12 col-lg">
                    <a class="btn btn-outline-danger btn-lg" href="{{ config_get('LSP_LINK') }}">
                        <b>ACCEPT THE CHALLENGE</b>
                    </a>
                </div>
            </div>
            <small class="text-secondary m-0">BNSP LISENSI NO: {{ config_get('BNSP_LICENSE_NUMBER') }} </small> <br>
            <small class="text-secondary m-0">ISO 9001:2015 CERT.NO: {{ config_get('ISO_9001:2015_CERT_NO') }}</small>
        </div>
    </section>

    <section class="py-3" id="features">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Berita
            </h1>

            <div class="row mb-3" style="row-gap: 1rem">
                @foreach ($berita->take(3) as $beri)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100">
                            <img style="height: 10rem; object-fit: cover;" class="w-100"
                                src="{{ $beri->imageUrl() }}" />
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title">
                                    <a class="text-decoration-none text-black"
                                        href="{{ route('berita.detail', $beri->slug) }}">
                                        <b>{{ $beri->title }}</b>
                                    </a>
                                </h5>
                                <small>
                                    {!! Str::words($beri->konten, 30, '...') !!}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card border-0 shadow">
                <ul class="list-group list-group-flush">
                    @foreach ($berita as $beri)
                        <li class="list-group-item">
                            <div class="d-flex gap-2">
                                <img style="height: 5rem; object-fit: cover; width: 5rem" class="rounded"
                                    src="{{ $beri->imageUrl() }}" />
                                <div class="d-flex flex-column">
                                    <h5 class="card-title">
                                        <a class="text-decoration-none text-black"
                                            href="{{ route('berita.detail', $beri->slug) }}">
                                            <b>{{ $beri->title }}</b>
                                        </a>
                                    </h5>
                                    <small>
                                        {!! Str::words($beri->konten, 50, '...') !!}
                                    </small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class="py-3" id="features">
        <div class="container px-5 my-5">
            <div class="mb-5 text-center" data-aos="fade-down">
                <h1>
                    <b>FAQ</b>
                </h1>
                <small>Frequently Asked Question (Pertanyaan yg sering ditanyakan)</small>
            </div>

            <div class="accordion" id="accordionExample" data-aos="fade-up">
                @php($i = 0)
                @foreach ($faq as $fa)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $i == 0 ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}"
                                aria-expanded="{{ $i == 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $i }}">
                                {{ $fa->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $i }}"
                            class="accordion-collapse collapse {{ $i == 0 ? 'show' : '' }}"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $fa->answer !!}
                            </div>
                        </div>
                    </div>
                    @php($i++)
                @endforeach
            </div>
        </div>
    </section>
</div>

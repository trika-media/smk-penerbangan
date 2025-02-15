<div>
    {{-- Carousel --}}
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"
                    src="https://www.shutterstock.com/image-photo/multiracial-students-walking-university-hall-600nw-685407808.jpg"
                    alt="First slide" style="object-fit: cover; height: 70vh; filter:brightness(50%)" />
                <div
                    class="carousel-caption d-none d-md-flex flex-column align-items-center justify-content-center h-100">
                    <h1>First slide</h1>
                    <p style="font-size: 1.2rem; width: 50%;">Eos mutat malis maluisset et, agam ancillae quo te, in vim
                        congue pertinacia.</p>
                    <button class="btn btn-primary">Baca Selengkapnya</button>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="https://www.shutterstock.com/image-photo/multiracial-students-walking-university-hall-600nw-685407808.jpg"
                    alt="Second slide" style="object-fit: cover; height: 70vh; filter:brightness(50%)" />
                <div
                    class="carousel-caption d-none d-md-flex flex-column align-items-center justify-content-center h-100">
                    <h1>Second slide</h1>
                    <p style="font-size: 1.2rem; width: 50%;">In numquam omittam sea.</p>
                    <button class="btn btn-primary">Baca Selengkapnya</button>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="https://www.shutterstock.com/image-photo/multiracial-students-walking-university-hall-600nw-685407808.jpg"
                    alt="Third slide" style="object-fit: cover; height: 70vh; filter:brightness(50%)" />
                <div
                    class="carousel-caption d-none d-md-flex flex-column align-items-center justify-content-center h-100">
                    <h1>Third slide</h1>
                    <p style="font-size: 1.2rem; width: 50%;">Lorem ipsum dolor sit amet, virtute consequat ea qui,
                        minim graeco mel no.</p>
                    <button class="btn btn-primary">Baca Selengkapnya</button>
                </div>
            </div>
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

    <section class="py-3" id="features">
        <div class="container px-5 my-5" data-aos="fade-right">
            <h1 class="mb-5 text-center">
                <b>Kenapa</b> Anda Harus Memilih <b>SMK Penerbangan</b>?
            </h1>

            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <p class="mb-0 display-4">
                                <b>AYAM GORENG</b>
                            </p>
                            <ul class="my-3">
                                @for ($i = 0; $i < 10; $i++)
                                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, eligendi?
                                    </li>
                                @endfor
                            </ul>
                            <p class="mb-2">
                                <b>Masukkan Ringkasan Kenapa Calon siswa harus memilih smk ini!</b>
                            </p>
                            <button class="btn btn-primary">
                                <i class="bx bxs-news me-3"></i> FORM PENDAFTARAN
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <img src="{{ asset('students.jpg') }}" class="img-fluid rounded" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3" id="features" data-aos="fade-up">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Jurusan
            </h1>

            <div class="row justify-content-center" style="row-gap: 1.2rem">
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card h-100">
                            <img style="height: 10rem; object-fit: cover;" class="w-100"
                                src="https://pilm.ac.id/wp-content/uploads/2023/03/Slider-TLI.png" />
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title">Teknik Listrik dan Instalasi</h5>
                                <small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde pariatur sequi
                                    deleniti? Nesciunt blanditiis soluta voluptas inventore autem iure
                                    harum!</small><br>
                                <a href="https://tarramatekkeng.desa.id/statistik"
                                    class="btn btn-outline-primary mt-3 py-2">
                                    Lihat Selengkapnya
                                    <i class="bx bx-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="py-3 bg-dark bg-opacity-75" id="features">
        <div class="container px-5 my-5 text-white" data-aos="fade-left">
            <h1 class="mb-5 text-center">
                <b>SISTEM PENERIMAAN MURID BARU</b>
                <br>
                <b>TA 2025/2026</b>
            </h1>

            <div class="row align-items-baseline" style="row-gap: 1.2rem">
                <div class="col-12 col-lg">
                    <h3 class="text-center"> RINCIAN BIAYA PENDAFTARAN <br> SPMB 2025/2026 </h3>
                    <p class="text-center mb-0 fs-3">GELOMBANG 3 <br> 01 JANUARI 2025 S/D 31 MARET 2025</p>
                    <table class="table table-borderless table-dark table-hover my-2">
                        <thead>
                            <tr>
                                <th style="width: 70%">Deksripsi</th>
                                <th style="width: 30%">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($tot_harga = 0)
                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <td> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem, id! </td>
                                    @php($harga = ($i + rand(5, 10)) * rand(2000, 8000))
                                    @php($tot_harga += $harga)
                                    <td>Rp. {{ number_format($harga, 0, 2) }}</td>
                                </tr>
                            @endfor
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

    <section class="py-3 bg-gradient bg-danger bg-opacity-75" id="features">
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
                        <b>SMK Penerbangan Ea</b>
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rerum, eligendi id omnis
                        sit voluptatum dolor quia fugit dignissimos dicta? Distinctio aspernatur voluptate velit eos
                        consequatur enim nisi quas aliquid perferendis repudiandae quod ipsum, incidunt hic vitae saepe
                        porro reiciendis assumenda id ipsa quisquam? Sunt ea hic autem aspernatur, consequatur iusto
                        veritatis molestias rerum vitae error laborum necessitatibus ex accusantium beatae amet incidunt
                        nisi magnam illo aliquam! Natus voluptas asperiores provident repellat nostrum adipisci iure,
                        deleniti saepe dignissimos veritatis quasi ducimus aut esse qui cupiditate nesciunt eum aperiam
                        omnis, accusantium distinctio quaerat perspiciatis earum dolores. Porro odit amet repudiandae
                        optio?
                    </p>
                </div>
                <div class="col-12 col-lg" data-aos="fade-right">
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="https://www.shutterstock.com/image-photo/multiracial-students-walking-university-hall-600nw-685407808.jpg"
                                    class="w-100 d-block" alt="First slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.shutterstock.com/image-photo/multiracial-students-walking-university-hall-600nw-685407808.jpg"
                                    class="w-100 d-block" alt="Second slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.shutterstock.com/image-photo/multiracial-students-walking-university-hall-600nw-685407808.jpg"
                                    class="w-100 d-block" alt="Third slide" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-3" id="features">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Yang Akan Anda Dapatkan Di <b>SMK Penerbangan Ea</b>
            </h1>
            <div class="row" style="row-gap: 1rem">
                <div class="col-12 col-lg-8">
                    <div class="card border-0 shadow" data-aos="fade-left">
                        <div class="card-body">
                            <p class="fs-2 mb-0">
                                <b>Keunggulan SMK Penerbangan Ea</b>
                            </p>
                            <ul class="my-3">
                                @for ($i = 0; $i < 10; $i++)
                                    <li class="mb-2">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, eligendi?
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card border-0 shadow" data-aos="fade-right">
                        <div class="card-body">
                            <img src="{{ asset('students.jpg') }}" class="img-fluid rounded" alt="image" />
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
                    <button class="btn btn-outline-danger btn-lg">
                        <b>ACCEPT THE CHALLENGE</b>
                    </button>
                </div>
            </div>
            <small class="text-secondary m-0">BNSP LISENSI NO: </small> <br>
            <small class="text-secondary m-0">ISO 9001:2015 CERT.NO: </small>
        </div>
    </section>

    <section class="py-3" id="features">
        <div class="container px-5 my-5">
            <h1 class="mb-5 text-center">
                Berita
            </h1>

            <div class="row mb-3" style="row-gap: 1rem">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100">
                            <img style="height: 10rem; object-fit: cover;" class="w-100"
                                src="https://pilm.ac.id/wp-content/uploads/2023/03/Slider-TLI.png" />
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title">
                                    <a class="text-decoration-none text-black" href="#">
                                        <b>Berita {{ $i }}</b>
                                    </a>
                                </h5>
                                <small>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo deserunt id
                                    laboriosam odit. Mollitia atque voluptas harum repellat maxime quasi...
                                </small>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="card border-0 shadow">
                <ul class="list-group list-group-flush">
                    @for ($i = 0; $i < 10; $i++)
                        <li class="list-group-item">
                            <div class="d-flex gap-2">
                                <img style="height: 5rem; object-fit: cover; width: 8rem" class="rounded"
                                    src="https://pilm.ac.id/wp-content/uploads/2023/03/Slider-TLI.png" />
                                <div class="d-flex flex-column">
                                    <h5 class="card-title">
                                        <a class="text-decoration-none text-black" href="#">
                                            <b>Berita {{ $i }}</b>
                                        </a>
                                    </h5>
                                    <small>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. In totam voluptatem
                                        velit quia nostrum nisi explicabo laudantium voluptate, excepturi odio libero
                                        porro non quaerat, suscipit ipsa? Dolores suscipit iusto quibusdam...
                                    </small>
                                </div>
                            </div>
                        </li>
                    @endfor
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
                @for ($i = 0; $i <= 5; $i++)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $i == 0 ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}"
                                aria-expanded="{{ $i == 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $i }}">
                                Accordion Item #{{ $i }}
                            </button>
                        </h2>
                        <div id="collapse{{ $i }}"
                            class="accordion-collapse collapse {{ $i == 0 ? 'show' : '' }}"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic possimus atque illo officia
                                beatae eveniet soluta corporis perferendis temporibus, eos cumque consectetur omnis
                                earum vero in ut eius nihil harum et at accusantium maxime eum unde. Totam, accusamus
                                minima excepturi atque corrupti sed deserunt fugit quia ullam est labore velit
                                voluptatum, cumque quae perspiciatis! Magni aperiam quae enim saepe deserunt
                                consequatur, debitis aliquam accusantium non amet commodi. Ipsum, nesciunt. Eaque
                                blanditiis dolore ad voluptatum aliquid. Quas fugit eius qui vitae nostrum asperiores
                                voluptatibus reprehenderit adipisci repellat magnam, veniam alias, nihil nemo assumenda
                                quae? Autem aliquam eius eveniet consequatur animi tempora.
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <x-partials.footer />
</div>

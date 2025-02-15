<div class="my-5 mx-5">
    <div class="card shadow border-0 mb-3">
        <div class="card-body">
            <h4 class="mb-0">
                <b>Jalur Pendaftaran</b>
            </h4>
            <p class="text-secondary">Cari Jalur Pendaftaran yang anda inginkan</p>
            <div class="row" style="row-gap: 1rem">
                <div class="col-12 col-lg-4">
                    <x-form.select2-inline name="jenis_perkuliahan" title="Jenis Perkuliahan" :options="[]" showAll />
                </div>  
                <div class="col-12 col-lg-4">
                    <x-form.select2-inline name="jenjang" title="Jenjang" :options="[]" showAll />
                </div>
                <div class="col-12 col-lg-4">
                    <x-form.select2-inline name="program_studi" title="Program Studi" :options="[]" showAll />
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <button class="btn btn-outline-success w-100">
                                <i class="bx bx-search me-2"></i> Cari
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow border-0">
        <div class="card-body">
            <div class="row align-items-center" style="row-gap: 1rem">
                <div class="col-12 col-lg-8">
                    <h5 class="mb-2">
                        <b>Jarvis Prestasi Akademik - Jarvis Prestasi Gelombang 1</b>
                    </h5>
                    <span class="text-secondary">
                        Persyaratan Pendaftaran :
                    </span>
                    <ul class="text-secondary mb-0">
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <div class="col-12 col-lg text-secondary">
                    <p class="mb-0">
                        <i class="bx bxs-graduation me-2"></i>Reguler
                    </p>
                    <p class="mb-0">
                        <i class="bx bxs-calendar me-2"></i>{{ now()->translatedFormat("d F Y") }} - {{ now()->addDays(10)->translatedFormat("d F Y") }}
                    </p>
                    <p class="mb-0">
                        <i class="bx bx-money me-2"></i>Biaya Daftar : Rp. 5.000.000,00
                    </p>
                </div>
                <div class="col-12 w-100">
                    <button class="btn btn-outline-primary btn-block d-grid w-100 d-flex justify-content-center align-items-center">
                        <i class="bx bx-check-circle me-2"></i> Daftar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

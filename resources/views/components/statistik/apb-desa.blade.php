<div>
    <section class="bg-light py-5 border-bottom">
        <div class="container px-5 my-5 px-5">
            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="card mb-3 border-0 bg-primary bg-gradient position-relative overflow-hidden">
                        <div class="card-body p-4 d-flex flex-column align-items-left">
                            <i
                                class="bx bx-copy position-absolute"
                                style="font-size: 4.5rem; top: 2rem; right: 2rem"></i>

                            <h2 class="h4 mb-1 text-white">Pendapatan Desa</h2>
                            <h1 class="fw-bold text-white">{{ money_format_idr($anggaran['pendapatan']['total']) }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card mb-3 border-0 bg-danger bg-gradient position-relative overflow-hidden">
                        <div class="card-body p-4 d-flex flex-column align-items-left">
                            <i
                                class="bx bx-cart-alt position-absolute"
                                style="font-size: 4.5rem; top: 2rem; right: 2rem"></i>

                            <h2 class="h4 mb-1 text-white">Belanja Desa</h2>
                            <h1 class="fw-bold text-white">{{ money_format_idr($anggaran['belanja']['total']) }}</h1>

                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card mb-3 border-0 bg-primary bg-gradient position-relative overflow-hidden">
                        <div class="card-body p-4 d-flex flex-column align-items-left">
                            <i
                                class="bx bx-cube-alt position-absolute"
                                style="font-size: 4.5rem; top: 2rem; right: 2rem"></i>

                            <h2 class="h4 mb-1 text-white">Penerimaan Desa</h2>
                            <h1 class="fw-bold text-white">{{ money_format_idr($anggaran['penerimaan']['total']) }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card mb-3 border-0 bg-danger bg-gradient position-relative overflow-hidden">
                        <div class="card-body p-4 d-flex flex-column align-items-left">
                            <i
                                class="bx bx-note position-absolute"
                                style="font-size: 4.5rem; top: 2rem; right: 2rem"></i>

                            <h2 class="h4 mb-1 text-white">Pengeluaran Desa</h2>
                            <h1 class="fw-bold text-white">{{ money_format_idr($anggaran['pengeluaran']['total']) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-bottom">
        <div class="container py-5 px-5">
            <div class="text-start mb-5 d-flex align-items-center">
                <div class="feature me-3 bg-primary bg-gradient text-white rounded-3">
                    <i class="bx bx-cube-alt" style="font-size: 2rem;"></i>
                </div>

                <h2 class="mb-0"><b class="fw-bold">Pendapatan Desa</b> <br> {{ env('APP_DESA') }}</h2>
            </div>

            <livewire:components.chart
                :data="$anggaran['pendapatan']"
                key="chart-pendapatan-desa" />
        </div>
    </section>

    <section class="bg-light py-5 border-bottom">
        <div class="container">
            <div class="accordion accordion-flush border" id="pendapatan-desa-accordion">
                @foreach($anggaran['pendapatan']['jenis'] as $index => $item)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#pendapatan-desa-accordion-{{ $index }}" aria-expanded="false" aria-controls="pendapatan-desa-accordion-{{ $index }}">
                            {{ $item['nama'] }} <span class="ms-auto badge bg-primary bg-gradient">{{ money_format_idr($item['total']) }}</span>
                        </button>
                    </h2>
                    <div id="pendapatan-desa-accordion-{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#pendapatan-desa-accordion">
                        <table class="table mb-0 border-b-0">
                            @foreach($item['anggaran'] as $itemAnggaran)
                            <tr>
                                <td>{{ $itemAnggaran['uraian'] }}</td>
                                <td>{{ money_format_idr($itemAnggaran['anggaran']) }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-bottom">
        <div class="container py-5 px-5">
            <div class="text-start mb-5 d-flex align-items-center">
                <div class="feature me-3 bg-danger bg-gradient text-white rounded-3">
                    <i class="bx bx-cart-alt" style="font-size: 2rem;"></i>
                </div>

                <h2 class="mb-0"><b class="fw-bold">Belanja Desa</b> <br> {{ env('APP_DESA') }}</h2>
            </div>

            <livewire:components.chart
                :data="$anggaran['belanja']"
                color="#dc3545"
                key="chart-belanja-desa" />
        </div>
    </section>

    <section class="bg-light py-5 border-bottom">
        <div class="container">
            <div class="accordion accordion-flush border" id="belanja-desa-accordion">
                @foreach($anggaran['belanja']['jenis'] as $index => $item)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#belanja-desa-accordion-{{ $index }}" aria-expanded="false" aria-controls="belanja-desa-accordion-{{ $index }}">
                            {{ $item['nama'] }} <span class="ms-auto badge bg-danger bg-gradient">{{ money_format_idr($item['total']) }}</span>
                        </button>
                    </h2>
                    <div id="belanja-desa-accordion-{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#belanja-desa-accordion">
                        <table class="table mb-0 border-b-0">
                            @foreach($item['anggaran'] as $itemAnggaran)
                            <tr>
                                <td>{{ $itemAnggaran['uraian'] }}</td>
                                <td>{{ money_format_idr($itemAnggaran['anggaran']) }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-bottom">
        <div class="container py-5 px-5">
            <div class="text-start mb-5 d-flex align-items-center">
                <div class="feature me-3 bg-primary bg-gradient text-white rounded-3">
                    <i class="bx bx-copy" style="font-size: 2rem;"></i>
                </div>

                <h2 class="mb-0"><b class="fw-bold">Pembiayaan Desa</b> <br> {{ env('APP_DESA') }}</h2>
            </div>

            <livewire:components.chart
                :data="[
                    'jenis' => [
                        [
                            'nama' => 'Penerimaan Desa',
                            'total' => $anggaran['penerimaan']['total'],
                        ],
                        [
                            'nama' => 'Pengeluaran Desa',
                            'total' => $anggaran['pengeluaran']['total'],
                        ],
                    ]
                ]"
                key="chart-belanja-desa" />
        </div>
    </section>

    <section class="bg-light py-5 border-bottom">
        <div class="container">
            <div class="accordion accordion-flush border" id="anggaran-desa-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#anggaran-desa-accordion-penerimaan" aria-expanded="false" aria-controls="anggaran-desa-accordion-penerimaan">
                            Penerimaan Desa <span class="ms-auto badge bg-primary bg-gradient">{{ money_format_idr($anggaran['penerimaan']['total']) }}</span>
                        </button>
                    </h2>
                    <div id="anggaran-desa-accordion-penerimaan" class="accordion-collapse collapse" data-bs-parent="#anggaran-desa-accordion">
                        <table class="table mb-0 border-b-0">
                            @foreach($anggaran['penerimaan']['anggaran'] as $itemAnggaran)
                            <tr>
                                <td>{{ $itemAnggaran['uraian'] }}</td>
                                <td>{{ money_format_idr($itemAnggaran['anggaran']) }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#anggaran-desa-accordion-pengeluaran" aria-expanded="false" aria-controls="anggaran-desa-accordion-pengeluaran">
                            Penerimaan Desa <span class="ms-auto badge bg-danger bg-gradient">{{ money_format_idr($anggaran['pengeluaran']['total']) }}</span>
                        </button>
                    </h2>
                    <div id="anggaran-desa-accordion-pengeluaran" class="accordion-collapse collapse" data-bs-parent="#anggaran-desa-accordion">
                        <table class="table mb-0 border-b-0">
                            @foreach($anggaran['pengeluaran']['anggaran'] as $itemAnggaran)
                            <tr>
                                <td>{{ $itemAnggaran['uraian'] }}</td>
                                <td>{{ money_format_idr($itemAnggaran['anggaran']) }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@assets
<link
    rel="stylesheet"
    href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />

<script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endassets
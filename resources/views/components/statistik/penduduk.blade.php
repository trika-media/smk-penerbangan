<div>
    <section class="bg-light border-bottom">
        <style>
            .jumlah-penduduk-section {
                margin-top: 20px;
                display: grid;
                gap: 10px;
                grid-template-columns: repeat(4, 1fr);
            }
        </style>

        <div class="container py-5 px-5 bg-light">
            <h2>Jumlah Penduduk dan Kepala Keluarga</h2>
            <div class="jumlah-penduduk-section">
                @foreach([
                [
                'Total Penduduk',
                $data['masyarakat']['penduduk'],
                'Friends'
                ],
                [
                'Kepala Keluarga',
                $data['masyarakat']['kepala_keluarga'],
                'Family'
                ],
                [
                'Laki Laki',
                $data['masyarakat']['laki_laki'],
                'Male'
                ],
                [
                'Perempuan',
                $data['masyarakat']['perempuan'],
                'Female'
                ],
                ] as $item)
                <div class="card">
                    <div class="card-body px-4">
                        <div class="d-flex flex-column justify-align-center">
                            <img
                                style="height: 130px;"
                                src="{{ asset('svg/'.$item[2].'.svg') }}" />
                            <div class="text-center mt-5 w-100">
                                <h3 class="mb-2">{{ $item[0] }}</h3>
                                <h3 class="mb-0"><b>{{ $item[1] }}</b> Jiwa</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-bottom">
        <div class="container py-5 px-5">
            <h2>Berdasarkan Kelompok Umur</h2>
            <div
                data-l="{{ json_encode($data['chart']['umur']['laki_laki']) }}"
                data-p="{{ json_encode($data['chart']['umur']['perempuan']) }}"
                id="chart-kelompok-umur"></div>
        </div>
    </section>

    {{-- <section class="bg-light border-bottom">
        <div class="container py-5 px-5 bg-light">
            <h2>Berdasarkan Dusun</h2>
            <div class="card mt-5">
                <div class="card-body">
                    <div id="chart-dusun"></div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="border-bottom">
        <div class="container py-5 px-5">
            <h2>Berdasarkan Pendidikan</h2>
            <div
                data-label="{{ json_encode($data['chart']['pendidikan']['label']) }}"
                data-count="{{ json_encode($data['chart']['pendidikan']['count']) }}"
                id="chart-pendidikan"></div>
        </div>
    </section>

    <section class="bg-light border-bottom">
        <style>
            .table> :not(caption)>*>* {
                padding: 1rem 0.5rem;
            }

            .card-table {
                max-height: 450px;
                overflow: scroll;
            }

            .table-striped>tbody>tr:nth-of-type(odd)>* {
                --bs-table-accent-bg: rgb(138 138 138 / 5%);
                color: var(--bs-table-striped-color);
            }
        </style>
        <div class="container py-5 px-5 bg-light">
            <h2>Berdasarkan Pekerjaan</h2>
            <div class="mt-5">
                <div class="row justify-content-center">
                    @foreach($data['pekerjaan'] as $item)
                    <div class="col-lg-3 mb-5 mb-lg-4">
                        <div class="card border-0 bg-primary bg-gradient position-relative overflow-hidden">
                            <div class="card-body p-4 d-flex flex-column align-items-left">
                                <i
                                    class="bx bx-cube position-absolute"
                                    style="font-size: 6rem; right: -30px"></i>

                                <h2 class="h4 mb-1 text-white">{{ $item['nama'] }}</h2>
                                <h1 class="fw-bold text-white">{{ $item['jumlah'] }}</h1>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="card mt-5 card-table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>JENIS PEKERJAAN</th>
                            <th>JUMLAH</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($status_pekerjaan as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
            <td>30</td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div> --}}
</div>
</section>

{{-- <section class="border-bottom">

        <div class="container py-5 px-5">
            <h2>Berdasarkan Wajib Pilih</h2>
            <div id="chart-wajib-pilih"></div>
        </div>
    </section> --}}

<section class="bg-light border-bottom">
    <div class="container py-5 px-5">
        <h2>Berdasarkan Perkawinan</h2>
        <div class="row">
            <div class="col-lg-4 d-flex align-items-center">
                <img
                    style="width: 100%;"
                    class="mb-3"
                    src="{{ asset('svg/Stack.svg') }}" />
            </div>
            <div class="col-lg-8 mb-4">
                <div class="row">
                    @foreach($data['perkawinan'] as $item)
                    <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-body px-4">
                                <h3 class="mb-2">{{ ucwords(strtolower($item['nama'])) }}</h3>
                                <h3 class="mb-0"><b>{{ $item['jumlah'] }}</b> Jiwa</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="border-bottom">
    <div class="container py-5 px-5">
        <h2>Berdasarkan Agama</h2>
        <div class="d-flex mt-5">
            <div class="row justify-content-center">
                @foreach($data['agama'] as $index => $item)
                <div class="col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body px-4">
                            <h3 class="mb-2">{{ ucwords(strtolower($index)) }}</h3>
                            <h3 class="mb-0"><b>{{ $item }}</b> Jiwa</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col- d-flex align-items-center">
                <img
                    style="width: 600px;"
                    class="mb-3"
                    src="{{ asset('svg/Talking.svg') }}" />
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

@script
<script>
    (function kelompokUmurChart() {
        let options = {
            series: [{
                    name: 'Males',
                    data: JSON.parse(document.querySelector("#chart-kelompok-umur").getAttribute('data-l'))
                },
                {
                    name: 'Females',
                    data: JSON.parse(document.querySelector("#chart-kelompok-umur").getAttribute('data-p'))
                }
            ],
            chart: {
                type: 'bar',
                height: 650,
                stacked: true
            },
            colors: ['#008FFB', '#FF4560'],
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    borderRadiusApplication: 'end', // 'around', 'end'
                    borderRadiusWhenStacked: 'all', // 'all', 'last'
                    horizontal: true,
                    barHeight: '80%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
                colors: ["#fff"]
            },

            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                }
            },
            yaxis: {
                stepSize: 1
            },
            tooltip: {
                shared: false,
                x: {
                    formatter: function(val) {
                        return val
                    }
                },
                y: {
                    formatter: function(val) {
                        if (val < 0) {
                            return val * -1;
                        }
                        return val;
                    }
                }
            },
            xaxis: {
                categories: ['85+', '80-84', '75-79', '70-74', '65-69', '60-64', '55-59', '50-54',
                    '45-49', '40-44', '35-39', '30-34', '25-29', '20-24', '15-19', '10-14', '5-9',
                    '0-4'
                ],
                title: {
                    text: 'Persentase'
                },
                labels: {
                    formatter: function(val) {
                        if (val < 0) {
                            return val * -1;
                        }
                        return val;
                    }
                }
            },
        };

        let chart = new ApexCharts(document.querySelector("#chart-kelompok-umur"), options);
        chart.render();
    })();

    (function pendidikanChart() {
        var options = {
            series: [{
                data: JSON.parse(document.querySelector("#chart-pendidikan").getAttribute('data-count'))
            }],
            chart: {
                type: 'bar',
                height: 600
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: JSON.parse(document.querySelector("#chart-pendidikan").getAttribute('data-label'))
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-pendidikan"), options);
        chart.render();
    })();
</script>
@endscript
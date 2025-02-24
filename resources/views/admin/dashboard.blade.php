<div>
    <x-heading title="Dashboard">
    </x-heading>

    <div class="row mb-3" style="row-gap: 1rem">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card" style="box-shadow: 5px -5px 0 0 rgba(var(--bs-primary-rgb), 1);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Jumlah Pendaftar</h4>
                            <h5>
                                <b>{{ $pendaftar_count }}</b>
                            </h5>
                        </div>
                        <div class="bg-primary text-white d-flex justify-content-center align-items-center"
                            style="width: 3.8rem; height: 3.8rem; border-radius: 50%">
                            <i class="bx bx-user-check bx-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card" style="box-shadow: 5px -5px 0 0 rgba(var(--bs-warning-rgb), 1);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Jumlah Kompetensi</h4>
                            <h5>
                                <b>{{ $jurusan_count }}</b>
                            </h5>
                        </div>
                        <div class="bg-warning text-white d-flex justify-content-center align-items-center"
                            style="width: 3.8rem; height: 3.8rem; border-radius: 50%">
                            <i class="bx bx-book-reader bx-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card" style="box-shadow: 5px -5px 0 0 rgba(var(--bs-success-rgb), 1);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Jumlah Periode</h4>
                            <h5>
                                <b>{{ $periode_count }}</b>
                            </h5>
                        </div>
                        <div class="bg-success text-white d-flex justify-content-center align-items-center"
                            style="width: 3.8rem; height: 3.8rem; border-radius: 50%">
                            <i class="bx bx-time bx-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div id="chart"></div>
        </div>
    </div>

    @push('script')
        <script>
            var options = {
                title: {
                    text: "Jumlah Pendaftar {{ config_get("APP_NAME") }}",
                    align: "center",
                    style: {
                        fontSize: "20px",
                        fontWeight: 'bold'
                    }
                },
                legend: {
                    position: 'bottom'
                },
                chart: {
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                    height: '400px',
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        distributed: true
                    }
                },
                noData: {
                    text: 'Loading...'
                },
                series: [],
                xaxis: {
                    type: 'category'
                }
            }
            document.addEventListener("DOMContentLoaded", () => {
                function loadChart() {
                    var data = @json($pendaftaran_data);
                    const range = [];
                    const late = [];

                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();

                    Object.keys(data).map(item => {
                        range.push(item);
                        late.push(data[item])
                    });

                    chart.updateSeries([{
                        name: "Keterlambatan",
                        data: late
                    }])

                    chart.updateOptions({
                        xaxis: {
                            categories: range
                        }
                    });
                }

                loadChart();
            });
        </script>
    @endpush
</div>

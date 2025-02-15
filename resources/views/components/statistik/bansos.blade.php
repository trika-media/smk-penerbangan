<div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 mb-5">
                <div class="d-flex">
                    <input wire:model="search" type="text" placeholder="Masukan NIK atau Kartu Keluarga...." class="form-control form-control-lg py-3 me-2">
                    <button wire:click="searchData" class="btn btn-primary bg-gradient px-3 d-flex align-items-center" style="font-size: 1.25rem;">
                        <i class=" bx bx-search mt-1 me-3"></i>
                        Cari
                    </button>
                </div>

                @if($dataMasyarakat)
                <div class="card mt-4">
                    <div class="card-body">
                        @if($dataMasyarakat['data'])
                        <table class="table table-bordered border table-striped">
                            <tr>
                                <td>Nomor Kartu Keluarga</td>
                                <td style="width: 1px">:</td>
                                <td class="fw-bold">{{ $dataMasyarakat['masyarakat']?->nomor_kartu_keluarga ?? 'Tidak Ada' }}</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td class="fw-bold">{{ $dataMasyarakat['masyarakat']?->nik ?? 'Tidak Ada' }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="fw-bold">{{ $dataMasyarakat['masyarakat']?->nama ?? 'Tidak Ada' }}</td>
                            </tr>
                        </table>

                        @forelse($dataMasyarakat['data'] as $item)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5>{{ $item->jenis_data->nama ?? 'Tidak Ada' }}</h5>
                            </div>
                        </div>
                        @empty
                        <div class="card">
                            <div class="card-body">
                                <h4 class="my-4 text-center">Tidak Ada Data</h4>
                            </div>
                        </div>
                        @endforelse
                        @else
                        <div class="card">
                            <div class="card-body">
                                <h4 class="my-4 text-center">Tidak Ada Data</h4>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

            </div>
            @foreach($data as $dataX)
            <div class="col-lg-4 mb-3">
                <div class="card border-0 bg-primary bg-gradient position-relative overflow-hidden h-100">
                    <div class="card-body p-4 d-flex flex-column align-items-left">
                        <i
                            class="bx bx-cube position-absolute"
                            style="font-size: 6rem; right: -30px; bottom: 1px"></i>

                        <h2 class="h4 mb-1 text-white" style="height: 4rem">{{ $dataX['jenis_data']['nama'] }}</h2>
                        <h1 class="fw-bold text-white">{{ $dataX['total'] }}</h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div>
    <section class="border-bottom">
        <div class="container py-5 px-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="text-start mb-4 d-flex align-items-center">
                        <div class="feature me-3 bg-primary bg-gradient text-white rounded-3">
                            <i class="bx bx-copy" style="font-size: 2rem;"></i>
                        </div>

                        <h2 class="mb-0"><b class="fw-bold">SDGs</b> <br> Desa {{ env('APP_DESA') }}</h2>
                    </div>
                    <p style="font-size: 1.3rem; text-align:justify" class="pe-4">
                        Sustainable Development Goals (SDGs) atau Tujuan Pembangunan Berkelanjutan adalah serangkaian 18 tujuan yang dicanangkan oleh Perserikatan Bangsa-Bangsa (PBB) sebagai cetak biru untuk mencapai masa depan yang lebih baik dan lebih berkelanjutan bagi semua orang.
                    </p>
                </div>

                <div class="col-lg-4">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <img src="/sdgs/0.png"
                            style="width: 200px"
                            alt="">

                        <h1 class="mt-4 fw-bold bg-primary px-3 py-2 rounded text-white">{{ $total }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="border-bottom bg-light">
        <div class="container py-5 px-5">
            <div class="row justify-content-center">
                @foreach($data as $index => $item)
                <div class="col-lg-2 mb-3">
                    <div class="card h-100" role="button" wire:click="openModal({{ $index }})">
                        <div class="card-body bg-gradient">
                            <div class="d-flex h-100 flex-column align-items-center justify-content-center">
                                <div class="">
                                    <img
                                        width="100px"
                                        class="border rounded border-2 border-white"
                                        src="/sdgs/{{ $index }}.png" alt="">
                                </div>

                                <h6 style="font-size: 1.2rem; max-width: 200px" class="text-center mt-3 mb-4">{{ $item['name'] }}</h6>
                                <h2 class="mt-auto fw-bold bg-primary bg-gradient text-white px-3 py-2 rounded">{{ $item['total'] !== false ? $item['total'] : "N/A" }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <button
        style="display: none;"
        type="button"
        id="button-open-modal"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalSdgs">
        Launch demo modal
    </button>

    <div class="modal fade modal-lg" id="modalSdgs" tabindex="-1" aria-labelledby="modalSdgsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalSdgsLabel">SDGs Desa {{ env('APP_DESA') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="ps-5">Nomor</th>
                            <th>Indikator</th>
                            <th>Capaian</th>
                            <th style="white-space: nowrap;">Data Existing</th>
                            <th class="pe-5">Satuan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($rows as $item)
                        <tr>
                            <td class="ps-5 text-center">{{ $item->nomor }}</td>
                            <td>{{ $item->indikator }}</td>
                            <td class="text-center">{{ $item->capaian }}</td>
                            <td class="text-center">{{ $item->data_existing }}</td>
                            <td class="pe-5 text-center">{{ $item->satuan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
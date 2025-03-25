<div>
    <section class="py-3 bg-primary">
        <div class="container px-5 my-5 text-white">
            <p class="display-3">
                <b>{{ config_get('APP_NAME') }}</b>
            </p>
            <p class="display-5">
                SPMB <b>{{ $info_pembayaran?->tahun_ajar }}</b>
            </p>
            <p class="text-uppercase">
                SISTEM PENERIMAAN MURID BARU {{ $info_pembayaran?->tahun_ajar }}
            </p>
        </div>
    </section>
    <section class="container py-3">
        <div class="row" style="row-gap: 1rem">
            <div class="col-12 col-lg-8">
                <div class="card rounded shadow border-0">
                    <div class="card-body">
                        <form wire:submit="save">
                            <h3 class="mb-3">
                                <b>Form Pendaftaran Calon Siswa Baru</b>
                            </h3>
                            <x-form.input title="Nama Lengkap" name="nama" wire:model="nama" />
                            <x-form.input title="Email" name="email" wire:model="email" />
                            <x-form.input title="Nomor HP" name="nohp" wire:model="nohp" />
                            <x-form.input title="Tempat Lahir" name="tempat_lahir" wire:model="tempat_lahir" />
                            <x-form.input title="Tanggal Lahir" name="tanggal_lahir" wire:model="tanggal_lahir"
                                type="date" />
                            <x-form.input title="Asal Sekolah" name="asal_sekolah" wire:model="asal_sekolah" />
                            <x-form.select title="Jenis Kelamin" name="jk" wire:model="jk">
                                <option value="" disabled>Pilih Jenis Kelamin</option>
                                @foreach (config('const.JENIS_KELAMIN') as $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['nama'] }}
                                    </option>
                                @endforeach
                            </x-form.select>
                            <x-form.select title="Agama" name="agama" wire:model="agama">
                                <option value="" disabled>Pilih Agama</option>
                                @foreach (config('const.AGAMA') as $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['nama'] }}
                                    </option>
                                @endforeach
                            </x-form.select>
                            <x-form.input title="Nama Ibu" name="nama_ibu" wire:model="nama_ibu" />
                            <x-form.input title="Nomor HP Ibu" name="nohp_ibu" wire:model="nohp_ibu" />
                            <x-form.select title="Jurusan" name="jurusan" wire:model="jurusan">
                                <option value="" disabled>Pilih Jurusan</option>
                                @foreach ($jurusan_data as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->nama }}
                                    </option>
                                @endforeach
                            </x-form.select>
                            {{-- <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-kartu-keluarga">Kartu Keluarga</label>
                                <div class="col-sm-10">
                                    <x-form.filepond name="KK" no_helper />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-akta-kelahiran">Akte Kelahiran</label>
                                <div class="col-sm-10">
                                    <x-form.filepond name="akte" no_helper />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="input-ijazah">Ijazah</label>
                                <div class="col-sm-10">
                                    <x-form.filepond name="ijazah" no_helper />
                                </div>
                            </div> --}}
                            <div class="d-flex justify-content-end gap-2">
                                <a class="btn btn-outline-primary" href="#">
                                    Form Pendaftaran
                                </a>
                                <button class="btn btn-success" type="submit">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-lg">
                <div class="card rounded shadow border-0">
                    <div class="card-body">
                        <h5>
                            <i class="bx bxs-file bx-sm me-2"></i>
                            <b>Syarat Pendaftaran</b>
                        </h5>
                        <ul>
                            <li style="margin-left: 1.2rem">Lorem, ipsum.</li>
                            <li style="margin-left: 1.2rem">Lorem, ipsum.</li>
                            <li style="margin-left: 1.2rem">Lorem, ipsum.</li>
                            <li style="margin-left: 1.2rem">Lorem, ipsum.</li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
</div>

<footer class="bg-dark p-5 text-white">
    <div class="mx-auto my-0 d-flex justify-content-between flex-wrap w-100">
        <!-- Left Section -->
        <div style="flex: 1; min-width: 250px;">
            <h4 style="margin-bottom: 10px;">{{ config_get('APP_NAME') }}</h4>
            <p style="font-size: 14px; margin-bottom: 0;">{{ config_get('ALAMAT_SEKOLAH') }}</p>
            <p class="mb-0 d-flex align-items-center fs-6">
                <i class="bx bxl-whatsapp bx-sm me-3"></i> {{ config_get('NOMOR_HANDPHONE') }}
            </p>
            <p class="mb-0 d-flex align-items-center fs-6">
                <i class="bx bxl-gmail bx-sm me-3"></i> {{ config_get('GMAIL_SEKOLAH') }}
            </p>
        </div>

        <!-- Middle Section (Links) -->
        <div style="flex: 1; min-width: 250px; text-align: start;">
            <h4 style="margin-bottom: 10px;">Profile Sekolah</h4>
            <ul style="list-style-type: none; padding: 0;">
                <li class="mb-2">
                    <a href="{{ route('profil.index', 'biodata') }}" class="text-white text-decoration-none d-block">
                        Profile Sekolah
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('keunggulan.index') }}" class="text-white text-decoration-none d-block">
                        Keunggulan
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('form-pendaftaran.index') }}" class="text-white text-decoration-none d-block">
                        Pendaftaran Calon Siswa Baru
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('login') }}" class="text-white text-decoration-none d-block">
                        Login
                    </a>
                </li>
            </ul>
        </div>

        <div style="flex: 1; min-width: 250px; text-align: start;">
            <div class="d-flex flex-column text-white">
                <h4 class="text-white">
                    Visit Data
                </h4>
                <div class="row">
                    <div class="col-6" style="font-size: 15px">Hari Ini</div>
                    <div class="col-6" style="font-size: 15px">
                        {{ App\Models\Visitor::where('date', now()->format('Y-m-d'))->count() }}</div>
                    <div class="col-6" style="font-size: 15px">Pekan Ini</div>
                    <div class="col-6" style="font-size: 15px">
                        {{ App\Models\Visitor::whereRaw('date <= ? AND date >= ?', [
                            now()->format('Y-m-d'),
                            Carbon\Carbon::parse(now())->subDays(7)->format('Y-m-d'),
                        ])->count() }}
                    </div>
                    <div class="col-6" style="font-size: 15px">Bulan Ini</div>
                    <div class="col-6" style="font-size: 15px">
                        {{ App\Models\Visitor::whereRaw('date <= ? AND date >= ?', [
                            now()->format('Y-m-d'),
                            Carbon\Carbon::parse(now())->subMonth()->format('Y-m-d'),
                        ])->count() }}
                    </div>
                    <div class="col-6" style="font-size: 15px">Tahun Ini</div>
                    <div class="col-6" style="font-size: 15px">
                        {{ App\Models\Visitor::whereRaw('date <= ? AND date >= ?', [
                            now()->format('Y-m-d'),
                            Carbon\Carbon::parse(now())->subYear()->format('Y-m-d'),
                        ])->count() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section (Social Media) -->
        <div style="flex: 1; min-width: 250px; text-align: start;">
            <h4 style="margin-bottom: 10px;">Social Media Kami</h4>
            <div style="display: flex; gap: 15px;">
                <button class="btn btn-primary btn-icon">
                    <i class="bx bxl-facebook"></i>
                </button>
                <button class="btn btn-info btn-icon text-white">
                    <i class="bx bxl-twitter"></i>
                </button>
                <button class="btn text-white btn-icon" style="background: #A45D9E">
                    <i class="bx bxl-instagram"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div style="text-align: center; margin-top: 20px; font-size: 12px;">
        <p>&copy; {{ now()->format('Y') }} {{ config_get('APP_NAME') }}. All Rights Reserved.</p>
    </div>
</footer>

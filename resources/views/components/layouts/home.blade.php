<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config_get('APP_NAME') }}</title>

    <link rel="shortcut icon" href="{{ asset('smk_logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('vendor/libs/boxicons/css/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/libs/toastr/toastr.min.css') }}">
    @stack('style')
    @livewireStyles
    @filepondScripts
</head>

<style>
    .nav-item .nav-link {
        transition: all 500ms cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .nav-item .nav-link.active,
    .nav-item:hover .nav-link {
        box-shadow: 0 -5px 0 -2px blue inset;
    }

    .btn-login {
        background: #0d6efd;
        color: #FFF;
        transition: all 1s cubic-bezier(0.215, 0.610, 0.355, 1);
    }

    .btn-login:hover {
        background: #135dcc;
        color: #FFF;
    }
</style>

<body class="d-flex flex-column" style="min-height: 100vh;">
    <section class="sticky-top">
        <div class="d-flex w-100 px-5 py-2 gap-4 text-white" style="background: #578FCA">
            <p class="mb-0 d-flex align-items-center fw-bold" style="font-size:14px;">
                <i class="bx bxl-whatsapp me-2" style="font-size:20px;"></i> {{ config_get('NOMOR_HANDPHONE') }}
            </p>
            <p class="mb-0 d-flex align-items-center fw-bold" style="font-size:14px;">
                <i class="bx bxl-gmail me-2" style="font-size:20px;"></i> {{ config_get('GMAIL_SEKOLAH') }}
            </p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow bg-opacity-75"
            style="backdrop-filter: blur(10px)">
            <div class="container py-2">
                <a class="navbar-brand w-100" href="/">
                    <img src="{{ asset('logo.png') }}" style="width: auto; object-fit: cover; height: 5rem;">
                    {{-- {{ config_get('APP_NAME') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 gap-2 me-2">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('welcome') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('welcome') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('form-pendaftaran*') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('form-pendaftaran.index') }}">
                                Pendaftaran
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Profil Sekolah
                            </a>
                            <ul class="dropdown-menu p-0">
                                <li>
                                    <a class="dropdown-item py-2 {{ Route::is('profil*') ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('profil.index') }}">Profil</a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2 {{ Route::is('mengapa-smk*') ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('mengapa-smk.index') }}">Mengapa SMK?</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('keunggulan*') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('keunggulan.index') }}">
                                Keunggulan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('jurusan*') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('jurusan.index') }}">
                                Jurusan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('berita*') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('berita.list') }}">
                                Berita
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-login" style="width: 10rem" href="{{ route('login') }}">
                    @auth
                        Dashboard
                    @endauth
                    @guest
                        Login
                    @endguest
                </a>
            </div>
        </nav>
    </section>

    <div style="background: url('{{ asset('pattern-bg.png') }}') no-repeat fixed center;">
        <x-alert />
        {{ $slot }}
        <x-partials.footer />
    </div>

    {{-- <livewire:components.footer /> --}}

    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- SELECT 2 -->
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- aos --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        .select2-selection--single {
            height: 39px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 13px;
            color: #697a8d;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #d9dee3;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px;
            right: 11px;
        }
    </style>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('vendor/libs/toastr/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @stack('script')
    @livewireScripts
</body>

</html>

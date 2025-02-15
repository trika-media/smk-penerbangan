<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMB PILM</title>

    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<style>
    .nav-item .nav-link {
        transition: all 500ms cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .nav-item .nav-link.active, .nav-item:hover .nav-link {
        box-shadow: 0 -5px 0 -2px blue inset;
    }

    .btn-login {
        background: #EF4B4B;
        color: #FFF;
        transition: all 2s cubic-bezier(0.215, 0.610, 0.355, 1);
    }

    .btn-login:hover {
        background: #f94242;
        color: #FFF;
    }
</style>

<body class="d-flex flex-column" style="min-height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top shadow bg-opacity-75" style="backdrop-filter: blur(10px)">
        <div class="container py-2">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('pilm.png') }}" style="width: 15%; object-fit: cover">
                PMB PILM
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('welcome') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('welcome') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('jalur-pendaftaran*') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('jalur-pendaftaran.index') }}">
                            Jalur Pendaftaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('pengumuman*') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('pengumuman.index') }}">
                            Pengumuman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('program-studi*') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('program-studi.index') }}">
                            Program Studi
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

    <div style="background: url('{{ asset('pattern-bg.png') }}') no-repeat fixed center;">
        {{ $slot }}
    </div>

    {{-- <livewire:components.footer /> --}}

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
        .select2-selection--single{
            height: 39px !important;
        }
    
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 38px;
        }
    
        .select2-container .select2-selection--single .select2-selection__rendered{
            padding-left: 13px;
            color: #697a8d;
        }
    
        .select2-container--default .select2-selection--single{
            border: 1px solid #d9dee3;
        }
    
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            top: 6px;
            right: 11px;
        }
    </style>
    <script>
        AOS.init();
    </script>
</body>

</html>

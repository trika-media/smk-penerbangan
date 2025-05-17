<meta charset="utf-8" />
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title>SMK Penerbangan</title>
<meta name="description" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('vendor/libs/boxicons/css/boxicons.css') }}" />
<link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

<link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="{{ asset('vendor/libs/toastr/toastr.min.css') }}">

<script src="{{ asset('vendor/js/helpers.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
@livewireStyles

<style>
    .card-loading {
        opacity: 0.5;
        pointer-events: none;
    }
    .card-table {
        border-radius: 1rem;
        overflow: hidden;
    }
</style>

<script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/js/menu.js') }}"></script>

<script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/dashboards-analytics.js') }}"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- SELECT 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@livewireScripts

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
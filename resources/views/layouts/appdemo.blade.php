<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />{{--Important for ajax request--}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}"/>
    <title>Project Monitoring | {{ isset($title) ? $title : '' }} </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">--}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/jquery.table2excel.js') }}"></script>
    <script src="{{ asset('js/jquery.print.js') }}"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style>
        .font-hg {
            font-size: 23px;
        }
        .font-lg {
            font-size: 18px;
        }
        .font-md {
            font-size: 14px;
        }
        .font-sm {
            font-size: 13px;
        }
        .font-xs {
            font-size: 11px;
        }
        .content-heading {
            color: #FFFFFF !important;
        }
        .requriedstar {
            color: #ff2825 !important;
        }
    </style>
</head>
<body>
<script>
    $(document).ready(function () {
        $("form").attr("autocomplete", 'off');
        $(".select2").select2();
        $(".mobile_no").mask("0000-0000000");
        $(".year_mask").mask("0000");
        $(".cnic").mask("0000000000000");
    //    $(".datepicker").datepicker({dateFormat: "mm/dd/yy"});
        $(".datepicker").datepicker({dateFormat: "dd-mm-yy"});
    });
    //for only alphabets
    $(document).on("input", ".only_alpha", function () {
        $(this).val($(this).val().replace(/[^A-Z a-z]/g, ''));
    });
    //for only number
    $(document).on("input", ".only_numeric", function () {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
</script>
<div id="wrapper">

    @if(isset(Auth::user()->name))
        @include('layouts.left')
        <!-- Page Content -->
        <div id="page-content-wrapper">
            @include('layouts.header')
            <div class="dashboard-middle-content">
                <div id="loadingDiv" class="loading"></div>
                @yield('content')
            </div>
            <!-- Content Wrapper. Contains page content -->
            <!-- /.content-wrapper -->
            @include('layouts.footer')
        </div>
    @else
        <br/>
        @yield('content')
    @endif

</div>
</body>
</html>
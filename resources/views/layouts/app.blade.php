<!DOCTYPE html>
<html lang="en">
<head>

    <title>Project Monitoring</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description"
          content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs."/>
    <meta name="keywords"
          content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="Codedthemes"/>

    <!-- Favicon icon -->
    {{--<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">--}}
    <link rel="icon" href="{{ asset('images/R.png') }}" type="image/x-icon">
    <!-- fontawesome icon -->
    {{--<link rel="stylesheet" href="../assets/fonts/fontawesome/css/fontawesome-all.min.css">--}}
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    {{--<link rel="stylesheet" href="../assets/plugins/animation/css/animate.min.css">--}}
    <link rel="stylesheet" href="{{ asset('plugins/animation/css/animate.min.css') }}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{--<link rel="stylesheet" href="../assets/css/style.css">--}}

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>

    <style>
        .custom-select, .form-control{
            height: 43px !important;
        }
    </style>

</head>

<body class="">

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

<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
@include('layouts.left')
@include('layouts.header')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">

    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        @yield('content')
                    </div>
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
    </div>
    <!-- Content Wrapper. Contains page content -->
    <!-- /.content-wrapper -->
</div>
<!-- [ Main Content ] end -->

<!-- Required Js -->
{{--<script src="../assets/js/vendor-all.min.js"></script>--}}
<script src="{{ asset('js/vendor-all.min.js') }}"></script>

<!-- Some Other Useful Scripts -->
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/jquery.table2excel.js') }}"></script>
<script src="{{ asset('js/jquery.print.js') }}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/pcoded.min.js') }}"></script>
{{--<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>--}}
{{--<script src="../assets/js/pcoded.min.js"></script>--}}

<!-- chart-morris Js -->
{{--<script src="../assets/plugins/chart-morris/js/raphael.min.js"></script>--}}
{{--<script src="../assets/plugins/chart-morris/js/morris.min.js"></script>--}}
{{--<script src="../assets/js/pages/chart-morris-custom.js"></script>--}}

{{--
<script src="{{ asset('plugins/chart-morris/js/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/chart-morris/js/morris.min.js') }}"></script>
<script src="{{ asset('js/pages/chart-morris-custom.js') }}"></script>
--}}

</body>
</html>
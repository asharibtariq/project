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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
          content="Flash Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
          content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
    <meta name="author" content="Codedthemes" />

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
</head>

<body class="">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->

<!-- [ navigation menu ] start -->
{{--<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">--}}
    {{--<div class="navbar-wrapper ">--}}
        {{--<div class="navbar-brand header-logo">--}}
            {{--<a href="dashboard.html" class="b-brand">--}}
                {{--<img src="" alt="" class="logo images">--}}

            {{--</a>--}}
            {{--<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>--}}
        {{--</div>--}}
        {{--<div class="navbar-content scroll-div">--}}
            {{--<ul class="nav pcoded-inner-navbar">--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="dashboard.html" class="nav-link"><span class="pcoded-micon"><i--}}
                                    {{--class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>--}}
                {{--</li>--}}

                {{--<li class="nav-item pcoded-hasmenu">--}}
                    {{--<a href="#!" class="nav-link"><span class="pcoded-micon"><i--}}
                                    {{--class="feather icon-box"></i></span><span class="pcoded-mtext">Summary</span></a>--}}
                    {{--<ul class="pcoded-submenu">--}}
                        {{--<li class=""><a href="summary_list_projects.html" class="">List</a></li>--}}
                        {{--<li class=""><a href="summary_add_projects.html" class="">Add</a></li>--}}

                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="user.html" class="nav-link"><span class="pcoded-micon"><i--}}
                                    {{--class="feather icon-file-text"></i></span><span class="pcoded-mtext">User</span></a>--}}
                {{--</li>--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="project.html" class="nav-link"><span class="pcoded-micon"><i--}}
                                    {{--class="feather icon-file-text"></i></span><span class="pcoded-mtext">Project</span></a>--}}
                {{--</li>--}}


                {{--<li class="nav-item ">--}}
                    {{--<a href="log.html" class="nav-link"><span class="pcoded-micon"><i--}}
                                    {{--class="feather icon-align-justify"></i></span><span--}}
                                {{--class="pcoded-mtext">Log</span></a>--}}

                {{--</li>--}}

            {{--</ul>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
{{--<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">--}}
    {{--<div class="m-header">--}}
        {{--<a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>--}}
        {{--<a href="dashboard.html" class="b-brand">--}}
            {{--<img src="../assets/images/logo.svg" alt="" class="logo images">--}}
            {{--<img src="../assets/images/logo-icon.svg" alt="" class="logo-thumb images">--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--<a class="mobile-menu" id="mobile-header" href="#!">--}}
        {{--<i class="feather icon-more-horizontal"></i>--}}
    {{--</a>--}}
    {{--<div class="collapse navbar-collapse">--}}
        {{--<a href="#!" class="mob-toggler"></a>--}}

        {{--<ul class="navbar-nav ml-auto">--}}

            {{--<li>--}}
                {{--<div class="dropdown drp-user">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="icon feather icon-settings"></i>--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu dropdown-menu-right profile-notification">--}}
                        {{--<div class="pro-head">--}}
                            {{--<img src="../assets/images/user/avatar-1.jpg" class="img-radius"--}}
                                 {{--alt="User-Profile-Image">--}}
                            {{--<span>User</span>--}}
                            {{--<a href="auth-signin.html" class="dud-logout" title="Logout">--}}
                                {{--<i class="feather icon-log-out"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<ul class="pro-body">--}}

                            {{--<li><a href="#!" class="dropdown-item"><i class="feather icon-user"></i> Profile</a>--}}
                            {{--</li>--}}

                            {{--<li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i>--}}
                                    {{--Log Out</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</header>--}}
<!-- [ Header ] end -->
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

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor-all.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/pcoded.min.js') }}"></script>
{{--<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>--}}
{{--<script src="../assets/js/pcoded.min.js"></script>--}}


<!-- chart-morris Js -->
{{--<script src="../assets/plugins/chart-morris/js/raphael.min.js"></script>--}}s
<script src="{{ asset('plugins/chart-morris/js/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/chart-morris/js/morris.min.js') }}"></script>
<script src="{{ asset('js/pages/chart-morris-custom.js') }}"></script>
{{--<script src="../assets/plugins/chart-morris/js/morris.min.js"></script>--}}
{{--<script src="../assets/js/pages/chart-morris-custom.js"></script>--}}

</body>

</html>

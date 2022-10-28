{{--@php--}}
{{--/*--}}
{{--$usersrole = Auth::user()->role_id;--}}
{{--$fullname = Auth::user()->fullname;--}}
{{--*/--}}
{{--$fullname = isset(Auth::user()->name) ? Auth::user()->name : '';--}}
{{--@endphp--}}
{{--<nav class="navbar navbar-expand-lg navbar-light nav-bg fixed-top">--}}
    {{--<a href="#" class="trapezoid" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>--}}
    {{--<div class="navbar-collapse" id="navbarSupportedContent">--}}
        {{--<ul class="navbar-nav">--}}
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--Welcome {{ $fullname }} <img style="margin-left: 10px;display: inline-block;" width="30" src="{{asset('img/7.png')}}" alt="logo">--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                    {{--<a class="list-group-item-action-main" href="{{ route('logout') }}"--}}
                       {{--onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                        {{--{{ __('Logout') }}--}}
                    {{--</a>--}}
                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</nav>--}}
{{--<!-- END HEADER -->--}}
{{--<!-- BEGIN HEADER & CONTENT DIVIDER -->--}}
{{--<div class="clearfix"></div>--}}

<!-- END HEADER & CONTENT DIVIDER -->

<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
<div class="m-header">
<a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
<a href="/" class="b-brand">
{{--<img src="../assets/images/logo.svg" alt="" class="logo images">--}}
{{--<img src="{{ asset('images/logo.svg') }}" alt="" class="logo images">--}}
    <h4>Project Monitoring</h4>
<img src="{{ asset('images/pm.png') }}" alt="" class="logo-thumb images">
{{--<img src="../assets/images/logo-icon.svg" alt="" class="logo-thumb images">--}}
</a>
</div>
<a class="mobile-menu" id="mobile-header" href="#!">
<i class="feather icon-more-horizontal"></i>
</a>
<div class="collapse navbar-collapse">
<a href="#!" class="mob-toggler"></a>

<ul class="navbar-nav ml-auto">

<li>
<div class="dropdown drp-user">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon feather icon-settings"></i>
</a>
<div class="dropdown-menu dropdown-menu-right profile-notification">
<div class="pro-head">
<img src="{{ asset('images/user/avatar-1.jpg') }}" class="img-radius"
alt="User-Profile-Image">
<span>User</span>
<a href="{{ route('logout') }}" class="dud-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="feather icon-log-out"></i>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</a>
</div>
<ul class="pro-body">

<li><a href="#" class="dropdown-item"><i class="feather icon-user"></i> Profile</a>
</li>

<li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="feather icon-lock"></i>
Log Out
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form> </a></li>
</ul>
</div>
</div>
</li>
</ul>
</div>
</header>
<!-- [ Header ] end -->
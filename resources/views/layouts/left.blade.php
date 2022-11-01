{{--$role_id = Auth::user()->role_id--}}
<!-- BEGIN SIDEBAR -->
{{--<div id="sidebar-wrapper">--}}
{{--<div class="sidebar-heading clearfix">--}}
{{--<a href="javascript:void(0)">Menu</a>--}}
{{--</div>--}}
{{--<div class="list-group-flush">--}}
{{--@include('layouts.left.admin')--}}
{{--</div>--}}
{{--</div>--}}

<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
    <div class="navbar-wrapper ">
        <div class="navbar-brand header-logo">
            <a href="/" class="b-brand">
                <img src="" alt="" class="logo images">
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item">
                    <a href="/" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Master Data</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{ url('designation') }}" class="">Designation</a></li>
                        <li class=""><a href="{{ url('executiveagency') }}" class="">Executive Agency</a></li>
                        <li class=""><a href="{{ url('component') }}" class="">Component</a></li>
                        <li class=""><a href="{{ url('organization') }}" class="">Organization</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('user') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">User</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('project') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Project</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('add_project_allocation') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Allocation</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END SIDEBAR -->
@php
/*
$usersrole = Auth::user()->role_id;
$fullname = Auth::user()->fullname;
*/
$fullname = isset(Auth::user()->name) ? Auth::user()->name : '';
@endphp
<nav class="navbar navbar-expand-lg navbar-light nav-bg fixed-top">
    <a href="#" class="trapezoid" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome {{ $fullname }} <img style="margin-left: 10px;display: inline-block;" width="30" src="{{asset('img/MinistryLogo.png')}}" alt="logo">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="list-group-item-action-main" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
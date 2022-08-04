<nav id="main-navbar">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand">
                <a class="logo" href="{{url('')}}">
                    <img src="{{asset('img/govt_logo.png')}}" alt="logo"> <span>Population Program Wing</span>
                </a>
            </div>
            <button class="navbar-toggle-btn">
                <i class="fa fa-bars"></i>
            </button>
            <button class="search-toggle-btn">
                <i class="fa fa-search"></i>
            </button>
        </div>

        {{--
        <div class="navbar-search">
            <button class="search-btn"><i class="fa fa-search"></i></button>
            <div class="search-form">
                <form method="post" action="#" name="search-form">
                    <input class="input" type="text" name="search" placeholder="Search">
                </form>
            </div>
        </div>
        --}}

        <ul class="navbar-menu nav navbar-nav navbar-right">
            <li><a href="{{url('')}}">Home</a></li>
            <li><a href="{{url('')}}#about">About</a></li>
            <li><a href="{{url('')}}#news">News</a></li>
            <li ><a href="{{url('')}}#events">Events</a></li>
            <li class="has-dropdown"><a href="#">NAP</a>
                <ul class="dropdown">
                    {{--<li><a href="#">The Context</a></li>--}}
                    {{--<li><a href="#">Vision</a></li>--}}
                    <li><a href="{{url("cci_recommendation")}}">CCI Recommendations</a></li>
                    <li><a href="{{url("https://visualindicators.com/cciportal/login")}}" target="_blank">CCI Portal</a></li>
                    <li><a href="{{url("task_force")}}">Task Force</a></li>
                    {{--<li><a href="#">Meetings FTF</a></li>--}}
                    <li><a href="{{url("national_action_plan")}}">NAP Progress</a></li>
                    <li><a href="{{url("pakistan_population_fund")}}">Population Fund</a></li>
                </ul>
            </li>
            <li class="has-dropdown"><a href="#">Media Centre</a>
                <ul class="dropdown">
                    {{--<li><a href="{{url('media')}}">Press Releases</a></li>--}}
                    <li><a href="{{url('press_details')}}">Press Releases</a></li>
                    <li><a href="{{url('training_details')}}">Training Material</a></li>
                    <li><a href="{{url('publication_details')}}">Publication</a></li>
                    <li><a href="{{url('picture_gallery')}}">Picture Gallery</a></li>
                    <li><a href="{{url('video_gallery')}}">Videos</a></li>
                    {{--<li><a href="{{url('videos')}}">Videos</a></li>--}}
                </ul>
            </li>
            <li><a href="{{url('')}}#contact">Contact</a></li>
        </ul>

    </div>
</nav>
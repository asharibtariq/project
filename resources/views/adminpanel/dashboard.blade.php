@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Welcome to Project Monitoring System</h3>
        <hr/>
    </div>
</div>

<form name="dashboard_post" method="post" action="{{url('dashboard')}}">
@csrf
<div class="row">
    <div class="col-md-4 offset-1">
        <div class="form-group">
            <label class="label-paf" for="start_date">Start Date: </label>
            <input type="text"
                   name="start_date"
                   id="start_date"
                   placeholder="MM/DD/YYYY"
                   class="form-control input-paf date-filter-fields datepicker"
                   value="{{$start_date}}"
                   readonly
                   required />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="label-paf" for="end_date">End Date: </label>
            <input type="text"
                   name="end_date"
                   id="end_date"
                   placeholder="MM/DD/YYYY"
                   class="form-control input-paf date-filter-fields datepicker"
                   value="{{$end_date}}"
                   readonly
                   required />
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="label-paf" for="submit_btn"> &nbsp; </label>
            <button type="submit" id="submit_btn" class="btn btn-info">
                <i class="fa fa-search"> Search</i>
            </button>
        </div>
    </div>
</div>
</form>

<div class="row">
    <div class="col-md-3 offset-1">
        <div class="dashboard-dashboardboxes-main">
            <div class="dashboard-dashboardboxes dashboard-dashboardboxes-transparent">
                <div class="no-of-transdashboard">Total Projects</div>
                <h3 class="nmbrs-amountdashboard mb-2">{{$total_projects}}</h3>
                {{--<div class="percentage-text"><span>5.6%</span> Since last Week</div>--}}
                <div class="services-icons"><img src="{{asset('img/project.png')}}" alt="logo" class="img-responsive"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-dashboardboxes-main">
            <!-- <div class="services-heading">Electricity Bill</div> -->
            <div class="dashboard-dashboardboxes dashboard-dashboardboxes-transparent">
                <div class="no-of-transdashboard">Total Allocations</div>
                <h3 class="nmbrs-amountdashboard mb-2">{{$total_allocations}}</h3>
                {{--<div class="percentage-text"><span style="color: red;">5.6%</span> Since last Week</div>--}}
                <div class="services-icons"><img src="{{asset('img/salary.png')}}" alt="logo" class="img-responsive"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-dashboardboxes-main">
            <div class="dashboard-dashboardboxes dashboard-dashboardboxes-transparent">
                <div class="no-of-transdashboard">Total Release</div>
                <h3 class="nmbrs-amountdashboard mb-2">{{$total_releases}}</h3>
                {{--<div class="percentage-text"><span>5.6%</span> Since last Week</div>--}}
                <div class="services-icons"><img src="{{asset('img/salary.png')}}" alt="logo" class="img-responsive"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 offset-2">
        <div class="dashboard-dashboardboxes-main">
            <div class="dashboard-dashboardboxes dashboard-dashboardboxes-transparent">
                <div class="no-of-transdashboard">Total Utilization</div>
                <h3 class="nmbrs-amountdashboard mb-2">{{$total_utilization}}</h3>
                {{--<div class="percentage-text"><span style="color: red;">5.6%</span> Since last Week</div>--}}
                <div class="services-icons"><img src="{{asset('img/salary.png')}}" alt="logo" class="img-responsive"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-dashboardboxes-main">
            <div class="dashboard-dashboardboxes dashboard-dashboardboxes-transparent">
                <div class="no-of-transdashboard">Financial Percentage</div>
                <h3 class="nmbrs-amountdashboard mb-2">{{$financial_percentage}}<small>%</small></h3>
                {{--<div class="percentage-text"><span style="color: red;">5.6%</span> Since last Week</div>--}}
                <div class="services-icons"><img src="{{asset('img/money-percent.png')}}" alt="logo" class="img-responsive"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(document).on("click", "#submit_btn", function () {
        var startdate = $("#start_date").val();
        var enddate = $("#end_date").val();
        if ($("#start_date").val() == '' && $("#start_date").val() == ''){
            alert("Please Select Start Date");
            return false;
        }
    });
    $(document).on('change', '#end_date, #start_date', function () {
        var startdate = $("#start_date").val();
        var enddate = $("#end_date").val();

        var startdate = new Date(startdate);
        var enddate = new Date(enddate);

        if (startdate > enddate){
            alert("End Date must be greater than Start Date...");
            $(this).val('');
            return false;
        }

    });
</script>

@endsection
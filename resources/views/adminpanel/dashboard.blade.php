@extends('layouts.app')
@section('content')
    <style>
        .dashboard_box {
            border-radius: 1em;
            box-shadow: 0 10px 20px rgba(0,0,0,.2);
        }
    </style>
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">

                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="text-center">
        <h2>
            WELCOME TO PROJECT MONITORING SYSTEM
        </h2>
    </div>
    <HR>

    <div class="container-fluid">

        <form name="dashboard_post" method="post" action="{{url('')}}">
        @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="start_date">From</label>
                        <input type="text" name="start_date" id="start_date" class="form-control datepicker date-filter" placeholder="DD/MM/YY" value="{{$start_date}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="end_date">To </label>
                        <input type="text" name="end_date" id="end_date" class="form-control datepicker date-filter" placeholder="DD/MM/YY" value="{{$end_date}}" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label> &nbsp; </label><br/>
                        <button type="submit" class="btn btn-info"><i class="feather icon-search"></i>Search</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <hr>
<!--
    <div class="row">
         product profit start
        <div class="col-xl-4 col-md-12">
            <div class="card prod-p-card bg-c-red">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h3 class="m-b-5 text-white">Total Projects</h3>
                            <h3 class="m-b-0 text-white">00</h3>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                        </div>
                    </div>
                    <p class="m-b-0 text-white">Currently Active Projects</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card prod-p-card bg-c-blue ">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h3 class="m-b-5 text-white">Total Allocations</h3>
                            <h3 class="m-b-0 text-white">00</h3>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt text-c-blue f-18"></i>
                        </div>
                    </div>
                    <p class="m-b-0 text-white">From Previous
                        Month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card prod-p-card bg-c-yellow ">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h3 class="m-b-5 text-white">Total Release</h3>
                            <h3 class="m-b-0 text-white">00</h3>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt text-c-yellow f-18"></i>
                        </div>
                    </div>
                    <p class="m-b-0 text-white">Total Project
                        Releases</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card prod-p-card bg-c-green">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h3 class="m-b-5 text-white">Total Utilization</h3>
                            <h3 class="m-b-0 text-white">00</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign text-c-green f-18"></i>
                        </div>
                    </div>
                    <p class="m-b-0 text-white">Total Project
                        Utilization</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card prod-p-card bg-c-info">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h3 class="m-b-5 text-white">Financial Percentage</h3>
                            <h3 class="m-b-0 text-white">0.00%</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags text-c-info f-18"></i>
                        </div>
                    </div>
                    <p class="m-b-0 text-white">Total Active Projects
                        Financial Percentage </p>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- sessions-section start -->
    <div class="row">
        <!-- New DashBoard Design  -->
        <div class="col-xl-4 col-md-12">
            <div class="card prod-p-card bg-c-green dashboard_box h-100">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h3 class="m-b-5 text-white">Project Count</h3>
                            <h3 class="m-b-0 text-white">{{$total_projects}}</h3>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt text-c-green f-18"></i>
                        </div>
                    </div>
                    <p class="m-b-0 text-white">Currently Active Projects</p>

                </div>
                {{--
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-white text-sm font-weight-bolder">+55% than last week</span></p>
                </div>
                --}}
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card prod-p-card bg-c-blue dashboard_box h-100">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h3 class="m-b-5 text-white">Project Monitoring</h3>
                            <h3 class="m-b-0 text-white">{{$total_projects_monitored}}</h3>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt text-c-blue f-18"></i>
                        </div>
                    </div>
                    <p class="m-b-0 text-white">Total Project Monitored</p>
                </div>
                {{--
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-white text-sm font-weight-bolder">+55% than last week</span></p>
                </div>
                --}}
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card prod-p-card bg-c-yellow dashboard_box h-100">
                <div class="card-body">
                    <div class="row align-items-center m-b-25">
                        <div class="col">
                            <h3 class="m-b-5 text-white">Total Tasks</h3>
                            @php $total_tasks = $total_tasks_complete + $total_tasks_ongoing + $total_tasks_not_achieve; @endphp
                            <h3 class="m-b-0 text-white">{{$total_tasks}}</h3>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt text-c-yellow f-18"></i>
                        </div>
                    </div>
                   <div class="row">
                       <div class="col-md-6">
                           <h6 class="text-white">Completed</h6>
                       </div>
                       <div class="col-md-6">
                           <h6 class="text-white">{{$total_tasks_complete}}</h6>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-white">On Going</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-white">{{$total_tasks_ongoing}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-white">Not Achieved</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-white">{{$total_tasks_not_achieve}}</h6>
                        </div>
                    </div>

                </div>
                {{--
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-white text-sm font-weight-bolder">+3% than last month</span></p>
                </div>
                --}}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(document).on('change', '#end_date, #start_date', function () {
                var startdate = $("#start_date").val();
                var enddate = $("#end_date").val();

                var startdate = new Date(startdate);
                var enddate = new Date(enddate);

                if (startdate > enddate) {
                    alert("End Date must be greater than Start Date...");
                    $(this).val('');
                    return false;
                }
            });
            $(document).on("click", "#submit_btn", function () {
                var startdate = $("#start_date").val();
                var enddate = $("#end_date").val();
                if ($("#start_date").val() == '' && $("#start_date").val() == '') {
                    alert("Please Select Start Date");
                    return false;
                }
            });
        });
    </script>
@endsection

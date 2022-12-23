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

        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>From</label>
                        <input type="text" id="start_date" class="form-control datepicker date-filter" placeholder="DD/MM/YY" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>To </label>
                        <input type="text" id="end_date" class="form-control datepicker date-filter" placeholder="DD/MM/YY" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label> &nbsp; </label><br/>
                        <button type="button" class="btn btn-info"><i class="feather icon-search"></i>Search</button>
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
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-white text-sm font-weight-bolder">+55% than last week</span></p>
                </div>
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
                    <p class="m-b-0 text-white">From Previous
                        Month</p>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-white text-sm font-weight-bolder">+55% than last week</span></p>
                </div>
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
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-white text-sm font-weight-bolder">+3% than last month</span></p>
                </div>
            </div>
        </div>


    </div> <br>



    <div class="card table-card">
        {{--
        <div class="card-header">
            <h5>Project Range</h5>
        </div>
        --}}
        <div class="card-body px-0 py-0">
            <div style="position:relative;">
                <br/>
                <figure class="highcharts-figure">
                    <div id="percent_range"></div>
                    <div class="highcharts-description table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info">
                            <thead>
                            <tr role="row">
                                <th data-column-index="0"> Sr#</th>
                                <th data-column-index="1"> Task</th>
                                <th data-column-index="3"> Planned Start Date</th>
                                <th data-column-index="3"> Planned End Date</th>
                                <th data-column-index="3"> Actual Start Date</th>
                                <th data-column-index="3"> Actual End Date</th>
                                <th data-column-index="3"> Status</th>
                            </thead>
                            <tbody>
                            <?php
                            $project_physical_targets = json_decode($project_physical_targets);
                            if (!empty($project_physical_targets)){
                            $i = 1;
                            ?>
                            <?php
                            foreach ($project_physical_targets as $physical_targets){
                            ?>
                            <tr role="row">
                                <td> {{$i}}</td>
                                <td> {{$physical_targets->physical_description}}</td>
                                <td> {{$physical_targets->start_date}}</td>
                                <td> {{$physical_targets->end_date}}</td>
                                <td> {{$physical_targets->act_start_date}}</td>
                                <td> {{$physical_targets->act_end_date}}</td>
                                <td>
                                    @if($physical_targets->target_status == "complete")
                                        @php echo "Complete" @endphp
                                    @elseif($physical_targets->target_status == "ongoing")
                                        @php echo "On-Going" @endphp
                                    @elseif($physical_targets->target_status == "not_achieve")
                                        @php echo "Not Achieved" @endphp
                                    @endif
                                </td>
                            </tr>
                            <?php
                            $i++;
                            }
                            ?>
                            <?php
                            }else{
                            ?>
                            <tr role="row">
                                <td colspan="7" class="text-center"> No Data Found </td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </figure>
            </div>
        </div>
    </div>
    <!-- sessions-section end -->

    {{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/xrange.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on("change", ".date-filter", function () {
                var startdate = $("#start_date").val();
                var enddate = $("#end_date").val();
                if (startdate != '' && enddate != '') {
                    if (startdate > enddate) {
                        alert("To date should be greater then From date...");
                        $(this).val('');
                        return false;
                    }
                }
            });
        });
        $(document).on("click", "#submit_btn", function () {
            var startdate = $("#start_date").val();
            var enddate = $("#end_date").val();
            if ($("#start_date").val() == '' && $("#start_date").val() == '') {
                alert("Please Select Start Date");
                return false;
            }
        });
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

        Highcharts.chart('percent_range', {
            chart: {
                type: 'xrange'
            },
            title: {
                text: 'Project Timeline Monitoring Percentage'
            },
            accessibility: {
                point: {
                    descriptionFormatter: function (point) {
                        var ix = point.index + 1,
                            category = point.yCategory,
                            from = new Date(point.x),
                            to = new Date(point.x2);
                        return ix + '. ' + category + ', ' + from.toDateString() +
                            ' to ' + to.toDateString() + '.';
                    }
                }
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: ''
                },
                categories: ['Backup', 'Recovery', 'Elementor Issue', 'VPN Issue'],
                //    categories: [{{$range_data['categories']}}],
                reversed: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Range',
                events: {
                    click: function (event) {
                        //    console.log(this);
                        alert(this.name + ' clicked\n');
                    }
                },
                // pointPadding: 0,
                // groupPadding: 0,
                borderColor: 'gray',
                pointWidth: 20,
                data: [{{$range_data['graph_data']}}
                    /*
                    {
                        x: Date.UTC(2014, 10, 21),
                        x2: Date.UTC(2014, 11, 2),
                        y: 0,
                        partialFill: 0.25
                    }, {
                        x: Date.UTC(2014, 11, 2),
                        x2: Date.UTC(2014, 11, 5),
                        y: 1,
                        partialFill: 0.75
                    }, {
                        x: Date.UTC(2014, 11, 8),
                        x2: Date.UTC(2014, 11, 9),
                        y: 2,
                        partialFill: 0.90
                    }, {
                        x: Date.UTC(2014, 11, 9),
                        x2: Date.UTC(2014, 11, 19),
                        y: 1,
                        partialFill: 0.15
                    }, {
                        x: Date.UTC(2014, 11, 10),
                        x2: Date.UTC(2014, 11, 23),
                        y: 2,
                        partialFill: 0.80
                    }, {
                        x: Date.UTC(2014, 11, 2),
                        x2: Date.UTC(2014, 11, 10),
                        y: 3,
                        partialFill: 1
                    }
                    */
                ],
                dataLabels: {
                    enabled: true
                }
            }]

        });

    </script>
@endsection

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
                        <li class="breadcrumb-item"><a href="{{url('')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Report</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card table-card">
        <div class="container-fluid">
            <br/>
            <form name="task_percent_report_post" method="post" action="{{url('task_percent_report')}}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="project_id">Project</label>
                            {!!$project_select!!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="start_date">From</label>
                            <input type="text" name="start_date" id="start_date" class="form-control datepicker date-filter" placeholder="DD/MM/YY" value="{{$start_date}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="end_date">To </label>
                            <input type="text" name="end_date" id="end_date" class="form-control datepicker date-filter" placeholder="DD/MM/YY" value="{{$end_date}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> &nbsp; </label><br/>
                            <button type="submit" class="btn btn-info"><i class="feather icon-search"></i>Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr/>
        </div>
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
            //    categories: ['Backup', 'Recovery', 'Elementor Issue', 'VPN Issue'],
            //    categories: [{{--$range_data['categories']--}}],
                categories: [
                    @if(!empty($range_data['categories_array'] && count($range_data['categories_array']) > 0))
                    <?php
                    $category_string = "";
                    foreach ($range_data['categories_array'] as $category_name){
                        $category_string .= "'" . $category_name . "',";
                    }
                    $category_string = rtrim($category_string, ',');
                    echo $category_string;
                    ?>
                    @endif
                ],
                reversed: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Project',
                events: {
                    click: function (event) {
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

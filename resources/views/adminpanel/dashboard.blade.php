@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Welcome to Project Monitoring System</h3>
        <hr/>
    </div>
</div>

<form name="dashboard_post" method="post" action="{{url('')}}">
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
<br/>

{{$range_data['categories']}}
{{$range_data['graph_data']}}

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <figure class="highcharts-figure">
            <div id="simple_range"></div>
            <div class="highcharts-description table-responsive">
                <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
                   aria-describedby="sample_1_info">
                <thead>
                <tr role="row">
                    <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> Sr#</th>
                    <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="1"> Task</th>
                    <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Planned Start Date</th>
                    <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Planned End Date</th>
                    <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual Start Date</th>
                    <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual End Date</th>
                    <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Status</th>
                </thead>
                <tbody>
                    <tr role="row">
                        <td> 1 </td>
                        <td> Backup </td>
                        <td> 01/01/1991 </td>
                        <td> 31/12/2000 </td>
                        <td> 01/01/2000 </td>
                        <td> 31/12/2022 </td>
                        <td> 10% </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </figure>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <figure class="highcharts-figure">
                <div id="percent_range"></div>
                <div class="highcharts-description table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
                           aria-describedby="sample_1_info">
                        <thead>
                        <tr role="row">
                            <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> Sr#</th>
                            <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="1"> Task</th>
                            <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Planned Start Date</th>
                            <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Planned End Date</th>
                            <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual Start Date</th>
                            <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual End Date</th>
                            <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Status</th>
                        </thead>
                        <tbody>
                        <tr role="row">
                            <td> 1 </td>
                            <td> Backup </td>
                            <td> 01/01/1991 </td>
                            <td> 31/12/2000 </td>
                            <td> 01/01/2000 </td>
                            <td> 31/12/2022 </td>
                            <td> 25% </td>
                        </tr>
                        <tr role="row">
                            <td> 2 </td>
                            <td> Recovery </td>
                            <td> 01/01/1991 </td>
                            <td> 31/12/2000 </td>
                            <td> 01/01/2000 </td>
                            <td> 31/12/2022 </td>
                            <td> 75% </td>
                        </tr>
                        <tr role="row">
                            <td> 3 </td>
                            <td> Elementor Issue </td>
                            <td> 01/01/1991 </td>
                            <td> 31/12/2000 </td>
                            <td> 01/01/2000 </td>
                            <td> 31/12/2022 </td>
                            <td> 80% </td>
                        </tr>
                        <tr role="row">
                            <td> 4 </td>
                            <td> VPN Issue </td>
                            <td> 01/01/1991 </td>
                            <td> 31/12/2000 </td>
                            <td> 01/01/2000 </td>
                            <td> 31/12/2022 </td>
                            <td> 100% </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </figure>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/xrange.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

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

    Highcharts.chart('simple_range', {

        chart: {
            type: 'columnrange',
            inverted: true
        },
        accessibility: {
            description: 'Image description: A column range chart compares the monthly temperature variations throughout 2017 in Vik I Sogn, Norway. The chart is interactive and displays the temperature range for each month when hovering over the data. The temperature is measured in degrees Celsius on the X-axis and the months are plotted on the Y-axis. The lowest temperature is recorded in March at minus 10.2 Celsius. The lowest range of temperatures is found in December ranging from a low of minus 9 to a high of 8.6 Celsius. The highest temperature is found in July at 26.2 Celsius. July also has the highest range of temperatures from 6 to 26.2 Celsius. The broadest range of temperatures is found in May ranging from a low of minus 0.6 to a high of 23.1 Celsius.'
        },
        title: {
            text: 'Project Timeline Monitoring'
        },
        subtitle: {
            text: 'Observed in MoNHSRC'
        },
        xAxis: {
            categories: ['Backup', 'Recovery', 'Elementor Issue', 'Vpn Issue']
        },
        yAxis: {
            title: {
                text: 'Timeline Dates'
            }
        },
        credits: {
            enabled: false
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            columnrange: {
                dataLabels: {
                    enabled: true,
                    format: '{y}'
                }
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Range',
            data: [
                [10, 5.2],
                [8, 10.6],
                [5, 11.6],
                [9, 16.8]
            ]
        }]
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
@extends('layouts.app')
@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">

                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i
                                    class="feather icon-home"></i></a></li>
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
                    <label>Start Date</label>
                    <input type="text" class="form-control"
                           placeholder="DD/MM/YY">
                </div>




            </div>

            <div class="col-md-4">



                <div class="form-group">
                    <label>End Date </label>
                    <input type="text" class="form-control"
                           placeholder="DD/MM/YY">
                </div>


            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="">  </label>
                    <button type="button" class="btn btn-info "><i class="feather icon-check"></i>Search</button>

                </div>



            </div>
        </div>
    </form>

</div>

<hr>

<div class="row">


    <!-- product profit start -->
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
<!-- sessions-section start -->
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
<!-- sessions-section end -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/xrange.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
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
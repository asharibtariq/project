@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if(Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="card">
                    <div class="card-header">
                        <h4>Project Summary</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="project_id" class="control-label label-paf">Project</label>
                                    {!! $project_select !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="project_id" class="control-label label-paf">FY</label>
                                    {!! $fiscal_year_select !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">&nbsp;</label>
                                    <div id="div_btn">
                                        <button type="button"
                                                id='b_search'
                                                title="Search"
                                                class="btn btn-info">
                                            <i class="fa fa-search"></i></button>
                                        <button type="button"
                                                id='btn-excel'
                                                title="Export to Excel"
                                                class="btn btn-success">
                                            <i class="fa fa-file-excel-o"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="dataTables_length" id="sample_1_length">
                                        <label>
                                            <select id="select_limit" name="sample_1_length" aria-controls="sample_1" class="form-control input-sm input-xsmall input-inline">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <!--<option value="">All</option>-->
                                            </select> entries
                                        </label>
                                    </div>
                                    <br/>
                                </div>
                                <div class="col-md-2">
                                    <div class="table-group-actions pull-right"></div>
                                </div>
                            </div>
                            <div class="table-responsive" id='my_data'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $(document).on('click', '#b_search', function () {
                show_ajax_cards('');
            });
            $(document).on('change', '#select_limit', function () {
                show_ajax_cards('');
            });
            $("#btn-excel").click(function () {
                $("#my_data th:last-child, #my_data td:last-child").remove();
                $("#my_data").table2excel({
                    exclude: ".noExl",
                    name: "Project Summary",
                    filename: "Project Summary"
                });
                location.reload();
            });
            //load page for fitrs time
            show_ajax_cards('');
        });
        $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            show_ajax_cards(page);
        });
        function show_ajax_cards(page='') {

            var baseurl = '{{url('/ajax_content')}}';
            if (page != ''){baseurl = '{{url('/ajax_content?page=')}}'+ page;}

            var post_data = {
                "_token": CSRF_TOKEN,
                "project_id": $("#project_id").val(),
                "fiscal_year": $("#fiscal_year").val(),
                "select_limit": $("#select_limit").val(),
                'action': "report_content"
            };

            $.ajax({
                url: baseurl,
                data: post_data,
                type: 'POST',
                success: function (data) {
                    $('#my_data').html(data);
                }
            });
        }
    </script>

@endsection
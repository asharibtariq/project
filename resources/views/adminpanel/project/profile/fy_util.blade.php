@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Project Details</h4>
                    </div>
                    <div class="card-body">
                        <!-- Project Forms Tabs -->
                        @include('adminpanel.project.profile_tabs')

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px"
                                     role="alert">{{ $error }}</div>
                            @endforeach
                            @if(Session::has('success'))
                                <div class="col-md-12">
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                </div>
                            @endif
                        @endif

                        <form name="" method="post" action="{{url('add_fy_util')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="project_id" value="{{$project_id}}" />
                                        <input type="hidden" name="project_name" value="{{$project->name}}" />
                                        <label for="fiscal_year">FY</label>
                                        {!! $fiscal_year_select !!}
                                        @if ($errors->has('fiscal_year'))
                                            <span class="text-danger">{{ $errors->first('fiscal_year') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlSelect1">Quarter</label>
                                        <select name="quarter" class="form-control"
                                                id="exampleFsormControlSelect1">
                                            <option value="1st">First Quarter</option>
                                            <option value="2nd">Second Quarter</option>
                                            <option value="3rd">Third Quarter</option>
                                            <option value="4th">Fourth Quarter</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Date</label>
                                        <input type="text" name="fy_date" id="fy_date" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('fy_date'))
                                            <span class="text-danger">{{ $errors->first('fy_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">Component</label>
                                        {!! $component_select !!}
                                        <input type="hidden" name="component" id="component" />
                                        <a href="../add_component" type="button" class="btn btn-info btn-sm float-right m-1"><i class="feather icon-plus"></i>Add</a>
                                        @if ($errors->has('component'))
                                            <span class="text-danger">{{ $errors->first('component') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount  (<small class="text-muted">PKR</small>) </label>
                                        <input type="number" name="fy_amount" id="fy_amount" class="form-control" placeholder="Amount">
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">Foreign Aid</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Currency</label>
                                        {!! $currency_select !!}
                                        <input type="hidden" name="currency" id="currency" />
                                        @if ($errors->has('currency'))
                                            <span class="text-danger">{{ $errors->first('currency') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount </label>
                                        <input type="number" name="foreign_fy_amount" id="foreign_fy_amount" class="form-control" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"> Enter</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr/>
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


                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $(document).on("change", "#currency_id", function () {
                var currency = $("#currency_id option:selected").text();
                $("#currency").val(currency);
            });
            $(document).on("change", "#component_id", function () {
                var component = $("#component_id option:selected").text();
                $("#component").val(component);
            });
            $(document).on('change', '#select_limit', function () {
                show_ajax_cards('');
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

            var baseurl = '{{url('/ajax_project_content')}}';
            if (page != ''){baseurl = '{{url('/ajax_project_content?page=')}}'+ page;}

            var post_data = {
                "_token": "{{ csrf_token() }}",
                "project_id": '{{$project_id}}',
                "select_limit": $("#select_limit").val(),
                'action': "fy_util_content"
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

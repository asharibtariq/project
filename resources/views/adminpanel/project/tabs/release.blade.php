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
                        @include('adminpanel.project.detail_tabs')

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

                        <form name="" method="post" action="{{url('add_release')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="project_id" value="{{$project_id}}" />
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
                                            id="exampleFormControlSelect1">
                                        <option>First Quarter</option>
                                        <option>Second Quarter</option>
                                        <option>Third Quarter</option>
                                        <option>Fourth Quarter</option>

                                    </select>
                                </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Date</label>
                                        <input type="text" name="release_date" id="release_date" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('release_date'))
                                            <span class="text-danger">{{ $errors->first('release_date') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount Released (<small class="text-muted">PKR</small>)</label>
                                        <input type="number" name="rel_amount" id="rel_amount" class="form-control" placeholder="Amount Released">
                                        @if ($errors->has('rel_amount'))
                                            <span class="text-danger">{{ $errors->first('rel_amount') }}</span>
                                        @endif
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
                                        <input type="number" name="foreign_rel_amount" id="foreign_rel_amount" class="form-control" placeholder="Amount">
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
                "select_limit": $("#select_limit").val(),
                'action': "release_content"
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


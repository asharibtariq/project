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
                        @include('adminpanel.project.project_details')
                        @include('adminpanel.project.physical_target_details')
                        @include('adminpanel.project.monitoring_tabs')
                        @if(Session::has('success'))
                             <div class="alert alert-success">{{Session::get('success')}}</div><br/>
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div><br/>
                            @endforeach
                        @endif

                        <form name="" method="post" action="{{url('add_physical_target_status')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" name="date" id="date" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        <input type="hidden" name="project_id" value="{{$project_id}}" />
                                        <input type="hidden" name="physical_target_id" value="{{$physical_target_id}}" />
                                        @if ($errors->has('date'))
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pace</label>
                                        <select name="pace" id="pace" class="form-control select2">
                                            <option value="">Select</option>
                                            <option value="slow">Slow</option>
                                            <option value="on_track">On Track</option>
                                            <option value="fast">Fast</option>
                                        </select>
                                        @if ($errors->has('pace'))
                                            <span class="text-danger">{{ $errors->first('pace') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control select2">
                                            <option value="">Select</option>
                                            <option value="in_process">In Process</option>
                                            <option value="complete">Complete</option>
                                            <option value="halted">Halted</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
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
                                <div class="table-group-actions float-right"></div>
                            </div>
                        </div>
                        <div class="table-responsive" id='my_data'></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
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

            var baseurl = '{{url('/ajax_physical_target_content')}}';
            if (page != ''){baseurl = '{{url('/ajax_physical_target_content?page=')}}'+ page;}

            var post_data = {
                "_token": "{{ csrf_token() }}",
                "physical_target_id": '{{$physical_target_id}}',
                "select_limit": $("#select_limit").val(),
                'action': "status_content"
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
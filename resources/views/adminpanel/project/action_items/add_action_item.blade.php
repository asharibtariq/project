@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Action Items</h4>
                    </div>
                    <div class="card-body">
                        <!-- Project Forms Tabs -->
                        @include('adminpanel.project.project_details')
                        @include('adminpanel.project.physical_target_details')

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

                        <form name="" method="post" action="{{url('add_action_item')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="project_id" value="{{$project_id}}" />
                                        <input type="hidden" name="project" value="{{$project->name}}" />
                                        <input type="hidden" name="physical_target_id" value="{{$physical_target_id}}" />
                                        <input type="hidden" name="component_id" value="{{$physical_target->component_id}}" />
                                        <input type="hidden" name="component" value="{{$physical_target->component}}" />
                                        <label>Component</label>
                                        <label class="form-control">{{$physical_target->component}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="action_item"> Action Item </label>
                                        <input type="text" name="action_item" class="form-control" placeholder="Action Item">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="assigned_to"> Assigned To </label>
                                        <input type="text" name="assigned_to" class="form-control" placeholder="Assigned To">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Start Date</label>
                                        <input type="text" name="start_date" id="start_date" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('start_date'))
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> End Date</label>
                                        <input type="text" name="end_date" id="end_date" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('end_date'))
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
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
                                <div class="table-group-actions pull-right"></div>
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

        var baseurl = '{{url('/ajax_project_content')}}';
        if (page != ''){baseurl = '{{url('/ajax_project_content?page=')}}'+ page;}

        var post_data = {
            "_token": "{{ csrf_token() }}",
            "project_id": '{{$project_id}}',
            "physical_target_id": '{{$physical_target_id}}',
            "select_limit": $("#select_limit").val(),
            'action': "add_action_items_content"
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

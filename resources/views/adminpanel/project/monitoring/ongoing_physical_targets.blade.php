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
                        @include('adminpanel.project.monitoring.project_details')
                        @if(Session::has('success'))
                             <div class="alert alert-success">{{Session::get('success')}}</div><br/>
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div><br/>
                            @endforeach
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Ongoing Targets</h4>
                                <br/>
                            </div>
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

            var baseurl = '{{url('/ajax_project_content')}}';
            if (page != ''){baseurl = '{{url('/ajax_project_content?page=')}}'+ page;}

            var post_data = {
                "_token": "{{ csrf_token() }}",
                "project_id": '{{$project_id}}',
                "status": 'ongoing',
                "select_limit": $("#select_limit").val(),
                'action': "physical_target_content"
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
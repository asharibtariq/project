@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Issues</h4>
                    </div>
                    <div class="card-body">
                        <!-- Project Forms Tabs -->
                        @include('adminpanel.project.monitoring.project_details')
                        @include('adminpanel.project.monitoring.physical_target_details')
                        @include('adminpanel.project.monitoring_tabs')

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        <form name="" method="post" action="{{url('add_issue_status')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date">Date (<small class="text-mute">Optional</small>)</label>
                                        <input type="text" name="date" class="form-control datepicker" placeholder="MM/DD/YYYY">
                                        <input type="hidden" name="project_id" value="{{$project_id}}" />
                                        <input type="hidden" name="project" value="{{$project->name}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="description">Issue <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" placeholder="Issue"></textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"> Add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(document).on("change", "#component_id", function () {
                var component = $("#component_id option:selected").text();
                $("#component").val(component);
            });
        });
    </script>
@endsection

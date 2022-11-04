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

                        <form name="" method="post" action="{{url('add_project_director')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                        <input type="text" id="project_id" name="project_id" value="{{$project_id}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                               placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">Designation</label>
                                        {!! $designation_select !!}
                                        <input type="hidden" name="designation" id="designation" />
                                        @if ($errors->has('designation'))
                                            <span class="text-danger">{{ $errors->first('designation') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Office Phone No</label>
                                        <input type="text" name="phone_no" id="phone_no" class="form-control mobile_no"
                                               placeholder="Office Phone No">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" name="wef_date" id="wef_date" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('wef_date'))
                                            <span class="text-danger">{{ $errors->first('wef_date') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="designation">Organization</label>
                                        {!! $organization_select !!}
                                        <input type="hidden" name="organization" id="organization" />
                                        @if ($errors->has('organization'))
                                            <span class="text-danger">{{ $errors->first('organization') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cell Number</label>
                                        <input type="text"name="cell_number" id="cell_number" class="form-control mobile_no"
                                               placeholder="Cell Number">
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

                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $(document).on("change", "#designation_id", function () {
                var designation = $("#designation_id option:selected").text();
                $("#designation").val(designation);
            });
            $(document).on("change", "#organization_id", function () {
                var organization = $("#organization_id option:selected").text();
                $("#organization").val(organization);
            });
        });


    </script>

@endsection

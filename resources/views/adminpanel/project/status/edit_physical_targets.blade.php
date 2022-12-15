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
                    @include('adminpanel.project.project_details')
                        <!-- Project Forms Tabs -->
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

                        <h4>Physical Target Details</h4>
                        <hr/><br/>
                        <form name="" method="post" action="{{url('update_physical_targets', $physical_target->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">FY</label>
                                        <label class="form-control">{{$physical_target->fiscal_year}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">Component</label>
                                        <label class="form-control">{{$physical_target->component}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Physical Target Description </label>
                                        <label class="form-control">{{$physical_target->physical_description}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">Allocated Budget</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Allocated Amount </label>
                                        <label class="form-control">{{$physical_target->amount}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <label class="form-control">{{$physical_target->start_date}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <label class="form-control">{{$physical_target->end_date}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" name="project_id" value="{{$physical_target->project_id}}" />
                                @if($physical_target->target_status == 'complete')
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Consumed Budget</label>
                                            <input type="number" name="amount" class="form-control" value="{{$physical_target->consumed_budget}}" placeholder="Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Actual Start Date</label>
                                            <input type="text" name="act_start_date" id="act_start_date" value="{{$physical_target->act_start_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                            @if ($errors->has('act_start_date'))
                                                <span class="text-danger">{{ $errors->first('act_start_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Actual End Date</label>
                                            <input type="text" name="act_end_date" id="act_end_date" value="{{$physical_target->act_end_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                            @if ($errors->has('act_end_date'))
                                                <span class="text-danger">{{ $errors->first('act_end_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @elseif($physical_target->target_status == 'not_achieve')
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Reason</label>
                                            <textarea type="text" name="reason" class="form-control">{{$physical_target->reason}}</textarea>
                                        </div>
                                    </div>
                                @elseif($physical_target->target_status == 'ongoing')
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Actual Start Date</label>
                                            <input type="text" name="act_start_date" id="act_start_date" value="{{$physical_target->act_start_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                            @if ($errors->has('act_start_date'))
                                                <span class="text-danger">{{ $errors->first('act_start_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Actual End Date</label>
                                            <input type="text" name="act_end_date" id="act_end_date" value="{{$physical_target->act_end_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                            @if ($errors->has('act_end_date'))
                                                <span class="text-danger">{{ $errors->first('act_end_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check">Update</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        });
    </script>
@endsection

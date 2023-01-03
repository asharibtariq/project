@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Physical Target</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        <form name="" method="post" action="{{url('add_physical_target')}}">
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
                                        <label> Physical Target Description </label>
                                        <textarea type="text" name="physical_description" class="form-control" placeholder="Physical Target Description"></textarea>
                                        @if ($errors->has('physical_description'))
                                            <span class="text-danger">{{ $errors->first('physical_description') }}</span>
                                        @endif
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
                                        <label for="exampleFormControlSelect1">Currency</label>
                                        {!! $currency_select !!}
                                        <input type="hidden" name="currency" id="currency" value="{{$project->currency}}" />
                                        @if ($errors->has('currency'))
                                            <span class="text-danger">{{ $errors->first('currency') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount </label>
                                        <input type="number" name="amount" class="form-control" placeholder="Amount">
                                        @if ($errors->has('amount'))
                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status </label>
                                        @if($target_status != '')
                                        <label class="form-control">
                                            @if($target_status == 'complete')
                                                Complete
                                            @elseif($target_status == 'ongoing')
                                                On Going
                                            @elseif($target_status == 'not_achieve')
                                                Not Achieved
                                            @endif
                                        </label>
                                        <input type="hidden" name="target_status" id="target_status" value="{{$target_status}}" />
                                        @else
                                        <select name="target_status" id="target_status" class="form-control select2">
                                            <option value="">Select</option>
                                            <option value="complete">Complete</option>
                                            <option value="ongoing">On Going</option>
                                            <option value="not_achieve">Not Achieved</option>
                                        </select>
                                        @endif
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
                                @if($target_status == 'not_achieve')
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Reason</label>
                                        <textarea type="text" name="reason" class="form-control"></textarea>
                                        @if ($errors->has('reason'))
                                            <span class="text-danger">{{ $errors->first('reason') }}</span>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"></i> Enter
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
@endsection

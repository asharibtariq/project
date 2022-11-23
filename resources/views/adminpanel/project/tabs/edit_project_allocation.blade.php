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
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div><br/>
                        @endif
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div><br/>
                            @endforeach
                        @endif

                        <form name="" method="post" action="{{url('update_allocation', $project->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">FY</label>
                                        <input type="hidden" name="project_id" value="{{$project->project_id}}" />
                                        {!! $fiscal_year_select !!}
                                        @if ($errors->has('fiscal_year'))
                                            <span class="text-danger">{{ $errors->first('fiscal_year') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Allocation Date</label>
                                        <input type="text" name="alloc_date" id="alloc_date" value="{{$project->alloc_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('alloc_date'))
                                            <span class="text-danger">{{ $errors->first('alloc_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount Allocated (<small class="text-muted">PKR</small>)</label>
                                        <input type="number" name="alloc_amount" id="alloc_amount"value="{{$project->alloc_amount}}" class="form-control" placeholder="Amount Allocated">
                                        @if ($errors->has('alloc_amount'))
                                            <span class="text-danger">{{ $errors->first('alloc_amount') }}</span>
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
                                        <input type="hidden" name="currency" id="currency" value="{{$project->currency}}" />
                                        @if ($errors->has('currency'))
                                            <span class="text-danger">{{ $errors->first('currency') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount </label>
                                        <input type="number" name="foreign_alloc_amount" value="{{$project->foreign_alloc_amount}}" id="foreign_alloc_amount" class="form-control" placeholder="Amount">
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
            $(document).on("change", "#currency_id", function () {
                var currency = $("#currency_id option:selected").text();
                $("#currency").val(currency);
            });
        });
    </script>

@endsection
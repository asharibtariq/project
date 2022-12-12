@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Project</h4>
                    </div>
                    <div class="card-body">
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

                        <form name="" method="post" action="{{url('add_project')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="psdp">PSDP</label>
                                        <input type="text" name="psdp" id="psdp" class="form-control input-paf"
                                               placeholder="PSDP#" minlength="3" required/>
                                        @if ($errors->has('psdp'))
                                            <span class="text-danger">{{ $errors->first('psdp') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="psid">ID</label>
                                        <input type="text" name="psid" id="psid" class="form-control input-paf"
                                               placeholder="ID#" minlength="3" required/>
                                        @if ($errors->has('psid'))
                                            <span class="text-danger">{{ $errors->first('psid') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control input-paf"
                                               placeholder="Name" minlength="3" required/>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="approval_type">Approval Type</label>
                                        <select name="approval_type" id="approval_type" class="form-control select2"
                                                required>
                                            <option value="">Select Type</option>
                                            <option value="New PC1">New PC1</option>
                                            <option value="Revised PC1">Revised PC1</option>
                                            <option value="Re-appropriation Budget">Re-appropriation Budget</option>

                                        </select>
                                        @if ($errors->has('approval_type'))
                                            <span class="text-danger">{{ $errors->first('approval_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">Fiscal Year</label>
                                        {!! $fiscal_year_select !!}
                                        @if ($errors->has('fiscal_year_select '))
                                            <span class="text-danger">{{ $errors->first('fiscal_year_select') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="executiveagency">Executive Agency</label>
                                        {!! $executiveagency_select!!}
                                        <input type="hidden" name="executiveagency" id="executiveagency" required/>
                                        <a href="../add_executiveagency" type="button"
                                           class="btn btn-info btn-sm float-right m-1"><i class="feather icon-plus"></i>Add</a>
                                        @if ($errors->has('executiveagency'))
                                            <span class="text-danger">{{ $errors->first('executiveagency') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="forum">Forum</label>
                                        <input type="text" name="forum" id="forum" class="form-control input-paf"
                                               placeholder="Forum" required/>
                                        @if ($errors->has('forum'))
                                            <span class="text-danger">{{ $errors->first('forum') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="approval_date">Approval Date</label>
                                        <input type="text" name="approval_date" id="approval_date"
                                               class="form-control input-paf datepicker" placeholder="Approval Date"
                                               required readonly/>
                                        @if ($errors->has('approval_date'))
                                            <span class="text-danger">{{ $errors->first('approval_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="cost">Total Cost (
                                            <small class="text-muted">Million(s)</small>
                                            )</label>
                                        <input type="number" name="cost" id="cost" step="any"
                                               class="form-control input-paf" placeholder="Cost" required/>
                                        @if ($errors->has('cost'))
                                            <span class="text-danger">{{ $errors->first('cost') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="currency">Currency</label>
                                        {!! $currency_select!!}
                                        <input type="hidden" name="currency" id="currency" required/>
                                        @if ($errors->has('currency'))
                                            <span class="text-danger">{{ $errors->first('currency') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="start_date">Start Date (
                                            <small class="text-muted">As per PC-I</small>
                                            )</label>
                                        <input type="text" name="start_date" id="start_date"
                                               class="form-control input-paf datepicker" placeholder="MM/DD/YYYY"
                                               readonly required/>
                                        @if ($errors->has('start_date'))
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="end_date">End Date (
                                            <small class="text-muted">As per PC-I</small>
                                            )</label>
                                        <input type="text" name="end_date" id="end_date"
                                               class="form-control input-paf datepicker" placeholder="MM/DD/YYYY"
                                               readonly required/>
                                        @if ($errors->has('end_date'))
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"> Enter</i>
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
            $(document).on("change", "#executiveagency_id", function () {
                var executiveagency = $("#executiveagency_id option:selected").text();
                $("#executiveagency").val(executiveagency);
            });
            $(document).on("change", "#currency_id", function () {
                var currency = $("#currency_id option:selected").text();
                $("#currency").val(currency);
            });
            /*
            $('.total-cost-fields').keyup(function () {
                var total = 0;
                $('.total-cost-fields').each(function () {
                    total += (parseFloat($(this).val()) || 0);
                });
                $('#cost').val(total);
            });
            */
        });
    </script>

@endsection
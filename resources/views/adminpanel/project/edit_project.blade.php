@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Project</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form method="post" action="{{url('update_project', $project->id)}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{--<input type="hidden" name="_method" value="PUT">--}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="psdp">psdp</label>
                                        <input type="text"
                                               name="psdp"
                                               id="psdp"
                                               class="form-control input-paf"
                                               placeholder="PSDP#"
                                               minlength="3"
                                               value="{{ $project->psdp}}"
                                               required />
                                        @if ($errors->has('psdp'))
                                            <span class="text-danger">{{ $errors->first('psdp') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="psid">ID</label>
                                        <input type="text"
                                               name="psid"
                                               id="psid"
                                               class="form-control input-paf"
                                               placeholder="ID#"
                                               minlength="3"
                                               value="{{ $project->psid}}"
                                               required />
                                        @if ($errors->has('psid'))
                                            <span class="text-danger">{{ $errors->first('psid') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="name">Name</label>
                                        <input type="text"
                                               name="name"
                                               id="name"
                                               class="form-control input-paf"
                                               placeholder="Name"
                                               minlength="3"
                                               value="{{ $project->name}}"
                                               required />
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="local_fund">Local Fund</label>
                                        <input type="number"
                                               name="local_fund"
                                               id="local_fund"
                                               step="any"
                                               class="form-control input-paf total-cost-fields"
                                               value="{{ $project->local_fund }}"
                                               placeholder="Local Fund"
                                               required />
                                        @if ($errors->has('local_fund'))
                                            <span class="text-danger">{{ $errors->first('local_fund') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="foreign_fund">Foreign Fund</label>
                                        <input type="number"
                                               name="foreign_fund"
                                               id="foreign_fund"
                                               step="any"
                                               class="form-control input-paf total-cost-fields"
                                               value="{{ $project->foreign_fund }}"
                                               placeholder="Local Fund"
                                               required />
                                        @if ($errors->has('foreign_fund'))
                                            <span class="text-danger">{{ $errors->first('foreign_fund') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="cost">Total Cost</label>
                                        <input type="number"
                                               name="cost"
                                               id="cost"
                                               step="any"
                                               class="form-control input-paf"
                                               value="{{ $project->cost }}"
                                               placeholder="Cost"
                                               readonly
                                               required />
                                        @if ($errors->has('cost'))
                                            <span class="text-danger">{{ $errors->first('cost') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="start_date">Start Date (<small class="text-muted">As per PC-I</small>)</label>
                                        <input type="text"
                                               name="start_date"
                                               id="start_date"
                                               class="form-control input-paf datepicker"
                                               value="{{ $project->start_date }}"
                                               placeholder="MM/DD/YYYY"
                                               readonly
                                               required />
                                        @if ($errors->has('start_date'))
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="end_date">End Date (<small class="text-muted">As per PC-I</small>)</label>
                                        <input type="text"
                                               name="end_date"
                                               id="end_date"
                                               class="form-control input-paf datepicker"
                                               value="{{ $project->end_date }}"
                                               placeholder="MM/DD/YYYY"
                                               readonly
                                               required />
                                        @if ($errors->has('end_date'))
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="complete_date">Likely Completion Date (<small class="text-muted">As per PC-I</small>)</label>
                                        <input type="text"
                                               name="complete_date"
                                               id="complete_date"
                                               class="form-control input-paf datepicker"
                                               value="{{ $project->complete_date }}"
                                               placeholder="MM/DD/YYYY"
                                               readonly
                                               required />
                                        @if ($errors->has('complete_date'))
                                            <span class="text-danger">{{ $errors->first('complete_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="status">Status</label>
                                        <select class="form-control input-paf" name="status" id="status">
                                            <option value="Y" {{$project->status == "Y" ? "selected" : ""}}>Active</option>
                                            <option value="N" {{$project->status == "N" ? "selected" : ""}}>In-Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="label-paf" for="btn_submit"> &nbsp; </label>
                                        <button type="submit" id="btn_submit" class="btn btn-info">
                                            <i class="fa fa-check"> Update</i>
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
            $('.total-cost-fields').keyup(function(){
                var total = 0;
                $('.total-cost-fields').each(function(){
                    total+=(parseFloat($(this).val()) || 0);
                });
                $('#cost').val(total);
            });
        });
    </script>
@endsection
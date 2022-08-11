@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Report</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form method="post" action="{{url('update_report', $report->id)}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{--<input type="hidden" name="_method" value="PUT">--}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year" class="control-label label-paf">FY</label>
                                        {!! $fiscal_year_select !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" value="{{ $project->id }}" hidden>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <h4>Allocation</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_rupee">Allocation (Rupee)</label>
                                        <input type="text" name="alloc_rupee" id="alloc_rupee" class="form-control input-paf " placeholder="Allocation (Rupee"  value="{{ $report->alloc_rupee}}" required />
                                        @if ($errors->has('alloc_rupee'))
                                            <span class="text-danger">{{ $errors->first('alloc_rupee') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_foreign">Foreign Aid</label>
                                        <input type="text" name="alloc_foreign" id="alloc_foreign" class="form-control input-paf" placeholder="Foreign Aid"  value="{{ $report->alloc_foreign}}"  />
                                        @if ($errors->has('alloc_foreign'))
                                            <span class="text-danger">{{ $errors->first('alloc_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_revised">Revised Rupee Allocation</label>
                                        <input type="text" name="alloc_revised" id="alloc_revised" class="form-control input-paf" placeholder="Revised Rupee"  value="{{ $report->alloc_revised}}" />
                                        @if ($errors->has('alloc_revised'))
                                            <span class="text-danger">{{ $errors->first('alloc_revised') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <h4>Releases / Sanction</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_fund_auth">Funds authorized by M/o PD&SI (Rupee)</label>
                                        <input type="text" name="release_fund_auth" id="release_fund_auth" class="form-control input-paf " placeholder="Funds authorized by M/o"  value="{{ $report->release_fund_auth}}" />
                                        @if ($errors->has('release_fund_auth'))
                                            <span class="text-danger">{{ $errors->first('release_fund_auth') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_fund_actual">Actual released by Ministry/Division Rupee </label>
                                        <input type="text" name="release_fund_actual" id="release_fund_actual" class="form-control input-paf InvQty" placeholder="Actual released/ sanctioned by Ministry"  value="{{ $report->release_fund_actual}}" />
                                        @if ($errors->has('release_fund_actual'))
                                            <span class="text-danger">{{ $errors->first('release_fund_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_foreign">Foreign Aid Disbursed</label>
                                        <input type="text" name="alloc_revised" id="release_foreign" class="form-control input-paf InvQty" placeholder="Foreign Aid Disbursed"  value="{{ $report->release_foreign}}" />
                                        @if ($errors->has('release_foreign'))
                                            <span class="text-danger">{{ $errors->first('release_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_total_actual">Total actual releases / disbursement</label>
                                        <input type="text" name="release_total_actual" id="Total" class="form-control input-paf" placeholder="Total actual releases"  value="{{ $report->release_total_actual}}" />
                                        @if ($errors->has('release_total_actual'))
                                            <span class="text-danger">{{ $errors->first('release_total_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <h4>Utilization</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_actual">Actual Rupee Utilization</label>
                                        <input type="text" name="util_actual" id="util_actual" class="form-control input-paf InvQty1" placeholder="Actual Rupee Utilization"  value="{{ $report->util_actual}}" />
                                        @if ($errors->has('util_actual'))
                                            <span class="text-danger">{{ $errors->first('util_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_foreign">Foreign Aid utilization</label>
                                        <input type="text" name="util_foreign" id="util_foreign" class="form-control input-paf InvQty1" placeholder="Foreign Aid utilization" value="{{ $report->util_foreign}}"  />
                                        @if ($errors->has('util_foreign'))
                                            <span class="text-danger">{{ $errors->first('util_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_total">Total Utilization</label>
                                        <input type="text" name="util_total" id="Total1" class="form-control input-paf" placeholder="Total Utilization"value="{{ $report->util_total}}"  />
                                        @if ($errors->has('util_total'))
                                            <span class="text-danger">{{ $errors->first('util_total') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <h4>End of FY</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="amt_surrender">Amount surrendered (if any)</label>
                                        <input type="text" name="amt_surrender" id="amt_surrender" class="form-control input-paf " placeholder="Amount surrendered"  value="{{ $report->amt_surrender}}" />
                                        @if ($errors->has('amt_surrender'))
                                            <span class="text-danger">{{ $errors->first('amt_surrender') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="amt_lapsed">Amount lapsed (if any) </label>
                                        <input type="text" name="amt_lapsed" id="amt_lapsed" class="form-control input-paf" placeholder="Amount lapsed"  value="{{ $report->amt_lapsed}}" />
                                        @if ($errors->has('amt_lapsed'))
                                            <span class="text-danger">{{ $errors->first('amt_lapsed') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="financial_prog">Financial Progress (%)n</label>
                                        <input type="text" name="financial_prog" id="financial_prog" class="form-control input-paf" placeholder="Financial Progress (%)"  value="{{ $report->financial_prog}}" />
                                        @if ($errors->has('financial_prog'))
                                            <span class="text-danger">{{ $errors->first('financial_prog') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="physical_prog">Physical Progress (%)</label>
                                        <input type="text" name="physical_prog" id="physical_prog" class="form-control input-paf" placeholder="Physical Progress (%)" value="{{ $report->physical_prog}}" />
                                        @if ($errors->has('physical_prog'))
                                            <span class="text-danger">{{ $errors->first('physical_prog') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="comp_date_likely">Completion date/likely date of completion</label>
                                        <input type="text" name="comp_date_likely" id="comp_date_likely" class="form-control input-paf" placeholder="Completion date"  value="{{ $report->comp_date_likely}}" />
                                        @if ($errors->has('comp_date_likely'))
                                            <span class="text-danger">{{ $errors->first('comp_date_likely') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <h4>Reports/ Remarks</h4>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label-paf" for="remarks">Remarks/ issues/Bottlenecks (if any)</label>
                                            <textarea name="remarks" id="remarks" class="form-control input-paf" placeholder="Remarks" minlength="3" value="{{ $report->remarks}}" ></textarea>
                                            @if ($errors->has('remarks'))
                                                <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label-paf" for="note">Note for our use</label>
                                            <textarea name="note" id="note" class="form-control input-paf" placeholder="Notes" minlength="3" value="{{ $report->note}}"></textarea>
                                            @if ($errors->has('note'))
                                                <span class="text-danger">{{ $errors->first('note') }}</span>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.InvQty').keyup(function(){

                var val2 = 0;
                $('.InvQty').each(function(){
                    val2+=(parseFloat($(this).val()) || 0);
                });
                $('#Total').val(val2);
            });
        });
        $(document).ready(function(){
            $('.InvQty1').keyup(function(){

                var val2 = 0;
                $('.InvQty1').each(function(){
                    val2+=(parseFloat($(this).val()) || 0);
                });
                $('#Total1').val(val2);
            });
        });
    </script>
@endsection
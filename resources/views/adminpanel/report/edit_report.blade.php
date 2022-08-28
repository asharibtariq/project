@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Project Summary</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px"
                                     role="alert">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form method="post" action="{{url('update_report', $report->id)}}"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{--<input type="hidden" name="_method" value="PUT">--}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="project_id" class="control-label label-paf"
                                               readonly="">Project</label>
                                        <input type="text" class="form-control input-paf "
                                               value="{{ $report->project}}" readonly> <input type="hidden" name="project_id" id="project_id" value="{{ $report->project_id}}"  >
                                        <input type="hidden" name="project" id="project" value="{{ $report->project}}" >
                                        <input type="hidden" name="report_id" id="report_id" value="{{ $report->id}}" >
                                        <input type="hidden" name="fiscal_year  " id="fiscal_year" value="{{ $report->fiscal_year}}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year" class="control-label label-paf" readonly="">FY</label>
                                        {{--{!! $fiscal_year_select !!}--}}
                                        <?php
                                        $fiscal_year_start = $report->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start . " - " . $report->fiscal_year;
                                        ?>
                                        <input type="text" class="form-control input-paf" id="fiscal_year "
                                               value="{{ $fiscal_year}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="date">Date</label>
                                        <input type="text"
                                               name="date"
                                               id="date"
                                               class="form-control input-paf datepicker"
                                               placeholder="MM/DD/YYYY"
                                               value="{{ $report->date}}"
                                               readonly/>
                                        @if ($errors->has('date'))
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <h4>Allocation</h4>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_rupee">Allocation (Rupee)</label>
                                        <input type="number" name="alloc_rupee" id="alloc_rupee"
                                               class="form-control input-paf total-alloc-fields" placeholder="Allocation (Rupee"
                                               value="{{ $report->alloc_rupee}}" step="any" required/>
                                        @if ($errors->has('alloc_rupee'))
                                            <span class="text-danger">{{ $errors->first('alloc_rupee') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_foreign">Foreign Aid</label>
                                        <input type="number" name="alloc_foreign" id="alloc_foreign"
                                               class="form-control input-paf total-alloc-fields" step="any" placeholder="Foreign Aid"
                                               value="{{ $report->alloc_foreign}}"/>
                                        @if ($errors->has('alloc_foreign'))
                                            <span class="text-danger">{{ $errors->first('alloc_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_total">Total Allocation</label>
                                        <input type="number"
                                               name="alloc_total"
                                               id="alloc_total"
                                               class="form-control input-paf"
                                               placeholder="Total Allocation"
                                               value="{{ $report->alloc_total}}"
                                               readonly/>
                                        @if ($errors->has('alloc_total'))
                                            <span class="text-danger">{{ $errors->first('alloc_total') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_revised">Revised Rupee Allocation</label>
                                        <input type="number" name="alloc_revised" id="alloc_revised"
                                               class="form-control input-paf" step="any" placeholder="Revised Rupee"
                                               value="{{ $report->alloc_revised}}"/>
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
                                        <label class="label-paf" for="release_fund_auth">Funds authorized by M/o PD&SI
                                            (Rupee)</label>
                                        <input type="number" name="release_fund_auth" id="release_fund_auth"
                                               class="form-control input-paf " step="any" placeholder="Funds authorized by M/o"
                                               value="{{ $report->release_fund_auth}}"/>
                                        @if ($errors->has('release_fund_auth'))
                                            <span class="text-danger">{{ $errors->first('release_fund_auth') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_fund_actual">Actual released by
                                            Ministry/Division Rupee </label>
                                        <input type="number" name="release_fund_actual" id="release_fund_actual"
                                               class="form-control input-paf total-release-fields" step="any"
                                               placeholder="Actual released/ sanctioned by Ministry"
                                               value="{{ $report->release_fund_actual}}"/>
                                        @if ($errors->has('release_fund_actual'))
                                            <span class="text-danger">{{ $errors->first('release_fund_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_foreign">Foreign Aid Disbursed</label>
                                        <input type="number" name="alloc_revised" id="release_foreign"
                                               class="form-control input-paf total-release-fields" step="any" placeholder="Foreign Aid Disbursed"
                                               value="{{ $report->release_foreign}}"/>
                                        @if ($errors->has('release_foreign'))
                                            <span class="text-danger">{{ $errors->first('release_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_total_actual">Total actual releases /
                                            disbursement</label>
                                        <input type="number" name="release_total_actual" id="release_total_actual"
                                               class="form-control input-paf" step="any" placeholder="Total actual releases"
                                               value="{{ $report->release_total_actual}}" readonly/>
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
                                        <input type="number" name="util_actual" id="util_actual"
                                               class="form-control input-paf total-util-fields" step="any"
                                               placeholder="Actual Rupee Utilization"
                                               value="{{ $report->util_actual}}"/>
                                        @if ($errors->has('util_actual'))
                                            <span class="text-danger">{{ $errors->first('util_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_foreign">Foreign Aid utilization</label>
                                        <input type="number" name="util_foreign" id="util_foreign"
                                               class="form-control input-paf total-util-fields" step="any"
                                               placeholder="Foreign Aid utilization"
                                               value="{{$report->util_foreign}}"/>
                                        @if ($errors->has('util_foreign'))
                                            <span class="text-danger">{{ $errors->first('util_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_total">Total Utilization</label>
                                        <input type="number" name="util_total" id="util_total" step="any" class="form-control input-paf"
                                               placeholder="Total Utilization" value="{{ $report->util_total}}"
                                               readonly/>
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
                                        <input type="number" name="amt_surrender" id="amt_surrender"
                                               class="form-control input-paf " step="any" placeholder="Amount surrendered"
                                               value="{{ $report->amt_surrender}}"/>
                                        @if ($errors->has('amt_surrender'))
                                            <span class="text-danger">{{ $errors->first('amt_surrender') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="amt_lapsed">Amount lapsed (if any) </label>
                                        <input type="number" name="amt_lapsed" id="amt_lapsed"
                                               class="form-control input-paf" step="any" placeholder="Amount lapsed"
                                               value="{{ $report->amt_lapsed}}"/>
                                        @if ($errors->has('amt_lapsed'))
                                            <span class="text-danger">{{ $errors->first('amt_lapsed') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="financial_prog">Financial Progress (%)</label>
                                        <input type="number"
                                               name="financial_prog"
                                               id="financial_prog"
                                               class="form-control input-paf"
                                               placeholder="Financial Progress (%)"
                                               value="{{ $report->financial_prog}}"
                                               readonly/>
                                        @if ($errors->has('financial_prog'))
                                            <span class="text-danger">{{ $errors->first('financial_prog') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="physical_prog">Physical Progress (%)</label>
                                        <input type="number" name="physical_prog" id="physical_prog"
                                               class="form-control input-paf" step="any" placeholder="Physical Progress (%)"
                                               value="{{ $report->physical_prog}}"/>
                                        @if ($errors->has('physical_prog'))
                                            <span class="text-danger">{{ $errors->first('physical_prog') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="label-paf" for="physical_prog_desc">Physical Progress Description</label>
                                        <textarea name="physical_prog_desc"
                                                  id="physical_prog_desc"
                                                  class="form-control input-paf"
                                                  placeholder="Description">{{ $report->physical_prog_desc}}</textarea>
                                        @if ($errors->has('physical_prog_desc'))
                                            <span class="text-danger">{{ $errors->first('physical_prog_desc') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="comp_date_likely">Completion date/likely date of Completion</label>
                                        <input type="text"
                                               name="comp_date_likely"
                                               id="comp_date_likely"
                                               class="form-control input-paf datepicker"
                                               placeholder="MM/DD/YYYY"
                                               value="{{ $report->comp_date_likely}}"
                                               readonly/>
                                        {{--<input type="text" name="comp_date_likely" id="comp_date_likely" class="form-control input-paf" placeholder="Completion date"  value="{{ $report->comp_date_likely}}" />--}}
                                        @if ($errors->has('comp_date_likely'))
                                            <span class="text-danger">{{ $errors->first('comp_date_likely') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <h4>Reports/ Remarks</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-paf" for="remarks">Remarks/ issues/Bottlenecks (if any)</label>
                                        <textarea name="remarks"
                                                  id="remarks"
                                                  class="form-control input-paf"
                                                  placeholder="Remarks">{{ $report->remarks}}</textarea>
                                        @if ($errors->has('remarks'))
                                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-paf" for="note">Note for our use</label>
                                        <textarea name="note"
                                                  id="note"
                                                  class="form-control input-paf"
                                                  placeholder="Notes">{{ $report->note}}</textarea>
                                        @if ($errors->has('note'))
                                            <span class="text-danger">{{ $errors->first('note') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="status">Status</label>
                                        <select class="form-control input-paf" name="status" id="status">
                                            <option value="Y" {{$report->status == "Y" ? "selected" : ""}}>Active
                                            </option>
                                            <option value="N" {{$report->status == "N" ? "selected" : ""}}>In-Active
                                            </option>
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
            var alloc_total = $("#alloc_total").val();
            var util_total = $("#util_total").val();

            $('.total-release-fields').keyup(function () {
                var total = 0;
                $('.total-release-fields').each(function () {
                    total += (parseFloat($(this).val()) || 0);
                });
                $('#release_total_actual').val(total);
            });
            $('.total-util-fields').keyup(function () {
                var total = 0;
                $('.total-util-fields').each(function () {
                    total += (parseFloat($(this).val()) || 0);
                });
                $('#util_total').val(total);
            });
            $('.total-alloc-fields').keyup(function(){
                var total = 0;
                $('.total-alloc-fields').each(function(){
                    total+=(parseFloat($(this).val()) || 0);
                });
                $('#alloc_total').val(total);
                // Global Alloc Value
                alloc_total = total;
            });
            $('#alloc_revised').keyup(function(){
                var total = 0;
                var alloc_revised = $(this).val();
                $("#alloc_rupee").val(alloc_revised);
                $('.total-alloc-fields').each(function(){
                    total+=(parseFloat($(this).val()) || 0);
                });
                $('#alloc_total').val(total);
            });
        });
    </script>
@endsection
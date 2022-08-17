@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Project Summary</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form name="" method="post" action="{{url('add_report')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="project_id" class="control-label label-paf">Project</label>
                                        {!! $project_select !!}
                                        <input type="hidden" name="project" id="project" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year" class="control-label label-paf">FY</label>
                                        {!!  $fiscal_year_select !!}
                                    </div>
                                </div>


                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <h4>Actual Expenditure</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{--<label for="actual_expend" class="control-label label-paf">Actual Expenditure</label>--}}
                                        <input type="number" id="actual_expend" step="any" class="form-control input-paf "placeholder="Actual Expenditure" name="actual_expend" >
                                    </div>
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
                                        <input type="number" name="alloc_rupee" id="alloc_rupee"  step="any" class="form-control input-paf"  placeholder="Allocation (Rupee)"  required />
                                        @if ($errors->has('alloc_rupee'))
                                            <span class="text-danger">{{ $errors->first('alloc_rupee') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_foreign">Foreign Aid</label>
                                        <input type="number" step="any" name="alloc_foreign" id="alloc_foreign" class="form-control input-paf" placeholder="Foreign Aid" />
                                        @if ($errors->has('alloc_foreign'))
                                            <span class="text-danger">{{ $errors->first('alloc_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_revised">Revised Rupee Allocation</label>
                                        <input type="number" name="alloc_revised" id="alloc_revised" step="any" class="form-control input-paf" placeholder="Revised Rupee"  />
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
                                        <input type="number" name="release_fund_auth" id="release_fund_auth" step="any" class="form-control input-paf " placeholder="Funds authorized by M/o"   />
                                        @if ($errors->has('release_fund_auth'))
                                            <span class="text-danger">{{ $errors->first('release_fund_auth') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_fund_actual">Actual released by Ministry/Division Rupee </label>
                                        <input type="number" name="release_fund_actual" id="release_fund_actual" step="any" class="form-control input-paf InvQty" placeholder="Actual released/ sanctioned by Ministry"   />
                                        @if ($errors->has('release_fund_actual'))
                                            <span class="text-danger">{{ $errors->first('release_fund_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_foreign">Foreign Aid Disbursed</label>
                                        <input type="number" name="release_foreign" id="release_foreign" step="any" class="form-control input-paf InvQty" placeholder="Foreign Aid Disbursed"   />
                                        @if ($errors->has('release_foreign'))
                                            <span class="text-danger">{{ $errors->first('release_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_total_actual">Total actual releases / disbursement</label>
                                        <input type="number" name="release_total_actual" id="release_total_actual" step="any" class="form-control input-paf Total" placeholder="Total actual releases"  readonly />
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
                                        <input type="number" name="util_actual" id="util_actual"step="any" class="form-control input-paf InvQty1" placeholder="Actual Rupee Utilization"   />
                                        @if ($errors->has('util_actual'))
                                            <span class="text-danger">{{ $errors->first('util_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_foreign">Foreign Aid utilization</label>
                                        <input type="number" name="util_foreign" id="util_foreign"step="any" class="form-control input-paf InvQty1" placeholder="Foreign Aid utilization"   />
                                        @if ($errors->has('util_foreign'))
                                            <span class="text-danger">{{ $errors->first('util_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_total">Total Utilization</label>
                                        <input type="number" name="util_total" id="util_total"step="any" class="form-control input-paf" placeholder="Total Utilization" readonly />
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
                                        <input type="number" name="amt_surrender" id="amt_surrender" step="any"class="form-control input-paf " placeholder="Amount surrendered"   />
                                        @if ($errors->has('amt_surrender'))
                                            <span class="text-danger">{{ $errors->first('amt_surrender') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="amt_lapsed">Amount lapsed (if any) </label>
                                        <input type="number" name="amt_lapsed" id="amt_lapsed"step="any" class="form-control input-paf" placeholder="Amount lapsed"  />
                                        @if ($errors->has('amt_lapsed'))
                                            <span class="text-danger">{{ $errors->first('amt_lapsed') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="financial_prog">Financial Progress (%)</label>
                                        <input type="number" name="financial_prog" id="financial_prog"step="any" class="form-control input-paf" placeholder="Financial Progress (%)"   />
                                        @if ($errors->has('financial_prog'))
                                            <span class="text-danger">{{ $errors->first('financial_prog') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="physical_prog">Physical Progress (%)</label>
                                        <input type="number" name="physical_prog" id="physical_prog"step="any" class="form-control input-paf" placeholder="Physical Progress (%)"  />
                                        @if ($errors->has('physical_prog'))
                                            <span class="text-danger">{{ $errors->first('physical_prog') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="comp_date_likely">Completion date/likely date of completion</label>
                                        <input type="text" name="comp_date_likely" id="comp_date_likely"
                                               class="form-control input-paf datepicker" placeholder="MM/DD/YYYY" readonly/>
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-paf" for="remarks">Remarks/ issues/Bottlenecks (if any)</label>
                                        <textarea name="remarks" id="remarks" class="form-control input-paf" placeholder="Remarks"  ></textarea>
                                       @if ($errors->has('remarks'))
                                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-paf" for="note">Note for our use</label>
                                        <textarea name="note" id="note" class="form-control input-paf" placeholder="Notes"   ></textarea>
                                        @if ($errors->has('note'))
                                            <span class="text-danger">{{ $errors->first('note') }}</span>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $('.InvQty').keyup(function(){
                var val2 = 0;
                $('.InvQty').each(function(){
                    val2+=(parseFloat($(this).val()) || 0);
                });
                $('#release_total_actual').val(val2);
            });

            $('.InvQty1').keyup(function(){
                var val2 = 0;
                var release_total_actual = $('#release_total_actual').val();
                $('.InvQty1').each(function(){
                    val2+=(parseFloat($(this).val()) || 0);
                });
                $('#util_total').val(val2);
                if (val2 > release_total_actual){
                    alert("Total Utilization cannot be greater than Total actual releases / disbursement...");
                    $("#util_actual").val('');
                    $("#util_foreign").val('');
                    $("#util_total").val('');
                    return false;
                }
            });

            $('#release_total_actual').keyup(function(){
                var release_total_actual = $(this).val();
                $('#util_total').prop('max', release_total_actual);
            });

        //    $('#').prop('max', val);

        });
        $(document).on('change', '#project_id', function () {
            var project_id = $(this).val();
            if (project_id > 0){
            //    $('#actual_expend').prop('readonly', true);
                var project = $("#project_id option:selected").text();
                $("#project").val(project);
            }else{
            //    $('#actual_expend').prop('readonly', false);
            }
            $('#fiscal_year').val('').change();
        //    $('#actual_expend').val('');
        });
        $(document).on('change', '#fiscal_year', function () {
            var project_id = $("#project_id").val();
            if (project_id > 0) {
                $.ajax({
                    url: '{{url('ajax_list')}}',
                    data: {"_token": CSRF_TOKEN, "fiscal_year": $(this).val(), "project_id": project_id},
                    type: 'POST',
                    success: function (data) {
                        var jsonData = $.parseJSON(data);
                        var status = jsonData.status;
                        var util_total = jsonData.util_total;

                        if (util_total > 0) {
                        //    $('#actual_expend').prop('readonly', true);
                        } else {
                        //    $('#actual_expend').prop('readonly', false);
                        }

                        if (status == 1) {
                            alert("Fiscal Year Already Added...");
                            $('#fiscal_year').val('').change();
                            return false;
                        } else {
                        //    $('#actual_expend').val(util_total);
                        }
                    }
                });
            }
        });

    </script>
@endsection
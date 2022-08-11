@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Report</h4>
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
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year" class="control-label label-paf">FY</label>
                                        {!! $fiscal_year_select !!}
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
                                        <input type="text" name="alloc_rupee" id="alloc_rupee" class="form-control input-paf only_numeric" placeholder="Allocation (Rupee)"  required />
                                        @if ($errors->has('alloc_rupee'))
                                            <span class="text-danger">{{ $errors->first('alloc_rupee') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_foreign">Foreign Aid</label>
                                        <input type="text" name="alloc_foreign" id="alloc_foreign" class="form-control input-paf" placeholder="Foreign Aid" />
                                        @if ($errors->has('alloc_foreign'))
                                            <span class="text-danger">{{ $errors->first('alloc_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_revised">Revised Rupee Allocation</label>
                                        <input type="text" name="alloc_revised" id="alloc_revised" class="form-control input-paf" placeholder="Revised Rupee"  />
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
                                        <input type="text" name="release_fund_auth" id="release_fund_auth" class="form-control input-paf " placeholder="Funds authorized by M/o"   />
                                        @if ($errors->has('release_fund_auth'))
                                            <span class="text-danger">{{ $errors->first('release_fund_auth') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_fund_actual">Actual released by Ministry/Division Rupee </label>
                                        <input type="text" name="release_fund_actual" id="release_fund_actual" class="form-control input-paf InvQty" placeholder="Actual released/ sanctioned by Ministry"   />
                                        @if ($errors->has('release_fund_actual'))
                                            <span class="text-danger">{{ $errors->first('release_fund_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_foreign">Foreign Aid Disbursed</label>
                                        <input type="text" name="release_foreign" id="release_foreign" class="form-control input-paf InvQty" placeholder="Foreign Aid Disbursed"   />
                                        @if ($errors->has('release_foreign'))
                                            <span class="text-danger">{{ $errors->first('release_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_total_actual">Total actual releases / disbursement</label>
                                        <input type="text" name="release_total_actual" id="Total" class="form-control input-paf Total" placeholder="Total actual releases"  readonly />
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
                                        <input type="text" name="util_actual" id="util_actual" class="form-control input-paf InvQty1" placeholder="Actual Rupee Utilization"   />
                                        @if ($errors->has('util_actual'))
                                            <span class="text-danger">{{ $errors->first('util_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_foreign">Foreign Aid utilization</label>
                                        <input type="text" name="util_foreign" id="util_foreign" class="form-control input-paf InvQty1" placeholder="Foreign Aid utilization"   />
                                        @if ($errors->has('util_foreign'))
                                            <span class="text-danger">{{ $errors->first('util_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_total">Total Utilization</label>
                                        <input type="text" name="util_total" id="Total1" class="form-control input-paf" placeholder="Total Utilization" readonly />
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
                                        <input type="text" name="amt_surrender" id="amt_surrender" class="form-control input-paf " placeholder="Amount surrendered"   />
                                        @if ($errors->has('amt_surrender'))
                                            <span class="text-danger">{{ $errors->first('amt_surrender') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="amt_lapsed">Amount lapsed (if any) </label>
                                        <input type="text" name="amt_lapsed" id="amt_lapsed" class="form-control input-paf" placeholder="Amount lapsed" minlength="3"  />
                                        @if ($errors->has('amt_lapsed'))
                                            <span class="text-danger">{{ $errors->first('amt_lapsed') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="financial_prog">Financial Progress (%)n</label>
                                        <input type="text" name="financial_prog" id="financial_prog" class="form-control input-paf" placeholder="Financial Progress (%)"   />
                                        @if ($errors->has('financial_prog'))
                                            <span class="text-danger">{{ $errors->first('financial_prog') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="physical_prog">Physical Progress (%)</label>
                                        <input type="text" name="physical_prog" id="physical_prog" class="form-control input-paf" placeholder="Physical Progress (%)"  />
                                        @if ($errors->has('physical_prog'))
                                            <span class="text-danger">{{ $errors->first('physical_prog') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="comp_date_likely">Completion date/likely date of completion</label>
                                        <input type="text" name="comp_date_likely" id="comp_date_likely" class="form-control input-paf" placeholder="Completion date"   />
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
                                        <textarea name="remarks" id="remarks" class="form-control input-paf" placeholder="Remarks" minlength="3"  ></textarea>
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
                $('#Total').val(val2);

            });

            $('.InvQty1').keyup(function(){
                var val2 = 0;
                $('.InvQty1').each(function(){
                    val2+=(parseFloat($(this).val()) || 0);
                });
                $('#Total1').val(val2);
            });

            $("#Total1").attr({
                "max" : $("#Total").val()      // substitute your own
            });

        });
        $(document).on('change', '#fiscal_year', function () {
            var project_id = $("#project_id").val();
            $.ajax({
                url: '{{url('ajax_list')}}',
                data: {"_token": CSRF_TOKEN, "fiscal_year": $(this).val(), "project_id":project_id},
                type: 'POST',
                success: function (data) {
                   alert(data);
                }
            });


        });
    </script>
@endsection
@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            @if(Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                </div>
            @endif
        </div>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="date">Date</label>
                                        <input type="text" name="date" id="date"
                                               class="form-control input-paf datepicker" placeholder="MM/DD/YYYY" readonly/>
                                        @if ($errors->has('date'))
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        @endif
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

                                <div class="col-md-5 table-responsive" id='my_data'></div>

                                {{--<div class="col-md-4">--}}
                                    {{--<div class="form-group">--}}

                                        {{--<label for="actual_expend" class="control-label label-paf">Actual Expenditure</label>--}}
                                        {{--<input type="number" id="actual_expend" step="any" class="form-control input-paf "placeholder="Actual Expenditure" name="actual_expend" >--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <br>
                            <div class="row">
                            <div class="form-group">
                            <h4>Allocation</h4>
                            </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_rupee">Allocation (Rupee)</label>
                                        <input type="number" name="alloc_rupee" id="alloc_rupee" step="any" class="form-control input-paf total-alloc-fields" placeholder="Allocation (Rupee)" required />
                                        @if ($errors->has('alloc_rupee'))
                                            <span class="text-danger">{{ $errors->first('alloc_rupee') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_foreign">Foreign Aid</label>
                                        <input type="number" step="any" name="alloc_foreign" id="alloc_foreign" class="form-control input-paf total-alloc-fields" placeholder="Foreign Aid" />
                                        @if ($errors->has('alloc_foreign'))
                                            <span class="text-danger">{{ $errors->first('alloc_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_total">Total Allocation</label>
                                        <input type="number" step="any" name="alloc_total" id="alloc_total" class="form-control input-paf financial-progress-formula" placeholder="Total Allocation" readonly required />
                                        @if ($errors->has('alloc_total'))
                                            <span class="text-danger">{{ $errors->first('alloc_total') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4" id="alloc_revised_div" style="display: none;">
                                    <div class="form-group">
                                        <label class="label-paf" for="alloc_revised">Revised Rupee Allocation</label>
                                        <input type="number" name="alloc_revised" id="alloc_revised" step="any" class="form-control input-paf" placeholder="Revised Rupee" />
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
                                        <input type="number" name="release_fund_actual" id="release_fund_actual" step="any" class="form-control input-paf total-release-fields" placeholder="Actual released/ sanctioned by Ministry"   />
                                        @if ($errors->has('release_fund_actual'))
                                            <span class="text-danger">{{ $errors->first('release_fund_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="release_foreign">Foreign Aid Disbursed</label>
                                        <input type="number" name="release_foreign" id="release_foreign" step="any" class="form-control input-paf total-release-fields" placeholder="Foreign Aid Disbursed"   />
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
                                        <input type="number" name="util_actual" id="util_actual"step="any" class="form-control input-paf total-util-fields" placeholder="Actual Rupee Utilization"   />
                                        @if ($errors->has('util_actual'))
                                            <span class="text-danger">{{ $errors->first('util_actual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_foreign">Foreign Aid utilization</label>
                                        <input type="number" name="util_foreign" id="util_foreign"step="any" class="form-control input-paf total-util-fields" placeholder="Foreign Aid utilization"   />
                                        @if ($errors->has('util_foreign'))
                                            <span class="text-danger">{{ $errors->first('util_foreign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="util_total">Total Utilization</label>
                                        <input type="number" name="util_total" id="util_total"step="any" class="form-control input-paf financial-progress-formula" placeholder="Total Utilization" readonly />
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
                                        <input type="number" name="financial_prog" id="financial_prog" class="form-control input-paf" placeholder="Financial Progress (%)" readonly/>
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
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="label-paf" for="physical_prog_desc">Physical Progress Description</label>
                                        <textarea name="physical_prog_desc" id="physical_prog_desc" class="form-control input-paf" placeholder="Description" ></textarea>
                                        @if ($errors->has('physical_prog_desc'))
                                            <span class="text-danger">{{ $errors->first('physical_prog_desc') }}</span>
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
            var alloc_total = $("#alloc_total").val();
            var util_total = $("#util_total").val();

            $('.total-alloc-fields').keyup(function(){

                var total = 0;
                $('.total-alloc-fields').each(function(){
                    total+=(parseFloat($(this).val()) || 0);
                });
                $('#alloc_total').val(total).trigger('keyup');
                // Global Alloc Value
                alloc_total = total;

            //    alloc_total = getTotalOfFields('.total-alloc-fields', '#alloc_total', $(this).val());
                console.log("Allocation Total: "+alloc_total);
            });
            $('#alloc_revised').keyup(function(){
                var total = 0;
                var alloc_revised = $(this).val();
                if (alloc_revised > 0) {
                    $("#alloc_rupee").val(alloc_revised);
                    $('.total-alloc-fields').each(function () {
                        total += (parseFloat($(this).val()) || 0);
                    });
                    $('#alloc_total').val(total).trigger('keyup');
                }
            });
            $('.total-release-fields').keyup(function(){
                var total = 0;
                $('.total-release-fields').each(function(){
                    total+=(parseFloat($(this).val()) || 0);
                });
                $('#release_total_actual').val(total).trigger('keyup');

            //    getTotalOfFields('.total-release-fields', '#release_total_actual', $(this).val());
                console.log("Release Total: "+total);
            });
            $('.total-util-fields').keyup(function(){
                var release_total_actual = $('#release_total_actual').val();

                var total = 0;
                $('.total-util-fields').each(function(){
                    total+=(parseFloat($(this).val()) || 0);
                });
                $('#util_total').val(total).trigger('keyup');
                // Global Util Value
                util_total = total;

            //    util_total = getTotalOfFields('.total-util-fields', '#util_total', $(this).val());
                console.log("Release Total: "+util_total);

            //    if (total > release_total_actual){
                if (util_total > release_total_actual){
                    alert("Total Utilization cannot be greater than Total actual releases / disbursement...");
                    $("#util_actual").val('');
                    $("#util_foreign").val('');
                    $("#util_total").val('');
                    return false;
                }
            });
            $('.financial-progress-formula').keyup(function(){
               // var util_total = $("#util_total").val('');
               // var alloc_total = $("#alloc_total").val('');
               //
                var financial_progress_precent = (util_total/alloc_total) * 100;
                $('#financial_prog').val(financial_progress_precent.toFixed(2));
            });
            $('#release_total_actual').keyup(function(){
                var release_total_actual = $(this).val();
                $('#util_total').prop('max', release_total_actual);
            });
        });

        $(document).on('change', '#project_id', function () {
            var project_id = $(this).val();
            if (project_id > 0){
                var project = $("#project_id option:selected").text();
                $("#project").val(project);
                ajax_expenditure_list(project_id);
                ajax_date_rec(project_id);
            }
            $('#date').val('');
            $('#alloc_rupee').val('');
            $('#alloc_foreign').val('');
            $('#alloc_rupee').prop('readonly', false);
            $('#alloc_foreign').prop('readonly', false);
            $('#alloc_total').val('');
        });

        $(document).on('change', '#fiscal_year', function () {
            var project_id = $("#project_id").val();
            var fiscal_year = $(this).val();
            var fiscal_year_minus_1 = parseInt(fiscal_year) - 1;
            var startDate = "07/01/"+fiscal_year_minus_1;
            var endDate = "06/01/"+fiscal_year;
        });

        $(document).on('change', '#date', function () {
            var project_id = $("#project_id").val();
            var date = $(this).val();

            var fiscal_year = $("#fiscal_year").val();
            var fiscal_year_minus_1 = parseInt(fiscal_year) - 1;
            var startDate = "07/01/"+fiscal_year_minus_1;
            var endDate = "06/30/"+fiscal_year;


        //    var date_year = date.substr(date.length - 4);

        //    var startDate = new Date($('#startDate').val());
        //    var endDate = new Date($('#endDate').val());
            var date = new Date(date);
            var startDate = new Date(startDate);
            var endDate = new Date(endDate);

            if (date < startDate){
                alert("Date is out of Fiscal Year Range...");
                $(this).val('');
                return false;
            }
            if (date > endDate){
                alert("Date is out of Fiscal Year Range...");
                $(this).val('');
                return false;
            }

            if (project_id > 0 && date != '') {
                ajax_check_date_rec(project_id, date)
            }else{
                alert("Please Select Project");
                return false;
            }
        });
        
        function ajax_expenditure_list(project_id) {
            $.ajax({
                url: '{{url('ajax_expenditure_list')}}',
                data: {"_token": CSRF_TOKEN, "project_id": project_id},
                type: 'POST',
                success: function (data) {
                    $('#my_data').html(data);
                }
            });
        }
        
        function ajax_date_rec(project_id) {
            $.ajax({
                url: '{{url('ajax_date_rec')}}',
                data: {"_token": CSRF_TOKEN, "project_id": project_id},
                type: 'POST',
                success: function (data) {
                    var jsonData = $.parseJSON(data);
                    var status = jsonData.status;
                    if (status > 0){
                        var alloc_rupee = jsonData.alloc_rupee;
                        var alloc_foreign = jsonData.alloc_foreign;
                        var alloc_total = parseFloat(alloc_rupee) + parseFloat(alloc_foreign);
                        $("#alloc_rupee").val(alloc_rupee).trigger('keyup');
                        $("#alloc_foreign").val(alloc_foreign).trigger('keyup');
                        $("#alloc_total").val(alloc_total).trigger('keyup');

                        $("#alloc_revised_div").show();
                        $("#alloc_rupee").prop('readonly', true);
                        $("#alloc_foreign").prop('readonly', true);
                    } else {
                        $("#alloc_rupee").val('');
                        $("#alloc_foreign").val('');
                        $("#alloc_total").val('');

                        $("#alloc_revised_div").hide();
                        $("#alloc_rupee").prop('readonly', false);
                        $("#alloc_foreign").prop('readonly', false);
                    }
                }
            });
        }

        function ajax_check_date_rec(project_id, date) {
            $.ajax({
                url: '{{url('ajax_check_date_rec')}}',
                data: {"_token": CSRF_TOKEN, "date": date, "project_id": project_id},
                type: 'POST',
                success: function (data) {
                    var jsonData = $.parseJSON(data);
                    var status = jsonData.status;
                    if (status > 0){
                        alert("Date already added...");
                        return false;
                    } else {

                    }
                }
            });
        }

    </script>

@endsection
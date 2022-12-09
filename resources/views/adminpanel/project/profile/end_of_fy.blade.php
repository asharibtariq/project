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
                        @include('adminpanel.project.profile_tabs')

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        <form name="" method="post" action="{{url('add_end_of_fy')}}">
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
                                        <label> Date</label>
                                        <input type="text" name="date" id="date" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('date'))
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">Amount Surrendered</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount (<small class="text-muted">PKR</small>) </label>
                                        <input type="number" name="local_amount_surrender" id="local_amount_surrender" class="form-control" placeholder="PKR">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Currency</label>
                                        {!! $currency_select_surrender !!}
                                        <input type="hidden" name="currency_surrender" id="currency_surrender" />
                                        @if ($errors->has('currency'))
                                            <span class="text-danger">{{ $errors->first('currency') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Foreign Aid </label>
                                        <input type="number" name="foreign_amount_surrender" id="foreign_amount_surrender" class="form-control" placeholder="Amount">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">Amount Lapsed</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount (<small class="text-muted">PKR</small>)  </label>
                                        <input type="number" name="local_amount_lapsed" id="local_amount_lapsed" class="form-control" placeholder="PKR">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Currency</label>
                                        {!! $currency_select_lapsed !!}
                                        <input type="hidden" name="currency_lapsed" id="currency_lapsed" />
                                        @if ($errors->has('currency'))
                                            <span class="text-danger">{{ $errors->first('currency') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Foreign Aid </label>
                                        <input type="number" name="foreign_amount_lapsed" id="foreign_amount_lapsed" class="form-control" placeholder="Amount">
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Financial Progress % </label>
                                        <input type="number" name="financial_progress" id="financial_progress" class="form-control" placeholder="Financial Progress %">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Physical Progress % </label>
                                        <input type="number" name="physical_progress" id="physical_progress" class="form-control" placeholder="Physical Progress %">
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea class="form-control" name="remarks"
                                                  id="exampleFormControlTextarea1" rows="4"
                                                  placeholder="Remarks"></textarea>
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

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>FY</th>
                                    <th>Component</th>
                                    <th>Amount  (<small class="text-muted">PKR</small>)</th>
                                    <th>Currency</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2050</td>
                                    <td>10-10-2022</td>
                                    <td>5000</td>
                                    <td>50$</td>
                                    <td>
                                        <div class="btn-group" role="group"
                                             aria-label="Basic example">
                                            <button type="button"
                                                    class="btn btn-sm btn-success">Edit
                                            </button>
                                            <button type="button"
                                                    class="btn btn-sm btn-info">Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center">Total</th>
                                    <td>5000</td>
                                    <td>50$</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $(document).on("change", "#currency_id_surrender", function () {
                var currency_surrender = $("#currency_id_surrender option:selected").text();
                $("#currency_surrender").val(currency_surrender);
            });
            $(document).on("change", "#currency_id_lapsed", function () {
                var currency_lapsed = $("#currency_id_lapsed option:selected").text();
                $("#currency_lapsed").val(currency_lapsed);
            });


        });

    </script>

@endsection

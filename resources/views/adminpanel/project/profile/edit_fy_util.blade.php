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

                        <form name="" method="post" action="{{url('update_fy_util', $project->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="project_id" value="{{$project->project_id}}" />
                                        <label for="fiscal_year">FY</label>
                                        {!! $fiscal_year_select !!}
                                        @if ($errors->has('fiscal_year'))
                                            <span class="text-danger">{{ $errors->first('fiscal_year') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                                for="exampleFormControlSelect1">Quarter</label>
                                        <select name="quarter" class="form-control"
                                                id="exampleFormControlSelect1">
                                            <option value="First Quarter" @php echo $project->quarter == 'First Quarter' ? 'selected' : ''; @endphp>First Quarter</option>
                                            <option value="Second Quarter" @php echo $project->quarter == 'Second Quarter' ? 'selected' : ''; @endphp>Second Quarter</option>
                                            <option value="Third Quarter" @php echo $project->quarter == 'Third Quarter' ? 'selected' : ''; @endphp>Third Quarter</option>
                                            <option value="Fourth Quarter" @php echo $project->quarter == 'Fourth Quarter' ? 'selected' : ''; @endphp>Fourth Quarter</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Date</label>
                                        <input type="text" name="fy_date" id="fy_date" value="{{$project->fy_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('fy_date'))
                                            <span class="text-danger">{{ $errors->first('fy_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">Component</label>
                                        {!! $component_select !!}
                                        <input type="hidden" name="component" id="component" value="{{$project->component}}" />
                                        {{--<a href="../add_component" type="button" class="btn btn-info btn-sm float-right m-1"><i class="feather icon-plus"></i>Add</a>--}}
                                        @if ($errors->has('component'))
                                            <span class="text-danger">{{ $errors->first('component') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount  (<small class="text-muted">PKR</small>) </label>
                                        <input type="number" name="fy_amount" id="fy_amount" value="{{$project->fy_amount}}" class="form-control" placeholder="Amount">
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
                                        <input type="number" name="foreign_fy_amount" id="foreign_fy_amount" value="{{$project->foreign_fy_amount}}" class="form-control" placeholder="Amount">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"> Update</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr/>
                        <!-- Table -->
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
            $(document).on("change", "#component_id", function () {
                var component = $("#component_id option:selected").text();
                $("#component").val(component);
            });

        });
    </script>
@endsection

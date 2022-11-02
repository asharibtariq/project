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
                        @include('adminpanel.project.detail_tabs')

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

                        <form name="" method="post" action="{{url('add_component_nis')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">FY</label>
                                        {!! $fiscal_year_select !!}
                                        @if ($errors->has('fiscal_year'))
                                            <span class="text-danger">{{ $errors->first('fiscal_year') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fiscal_year">Component</label>
                                        {!! $component_select !!}
                                        @if ($errors->has('component_select'))
                                            <span class="text-danger">{{ $errors->first('component_select') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount  (<small class="text-muted">PKR</small>)</label>
                                        <input type="number" name="alloc_amount" id="alloc_amount" class="form-control" placeholder="Amount ">
                                        @if ($errors->has('alloc_amount'))
                                            <span class="text-danger">{{ $errors->first('alloc_amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Currency</label>
                                        {!! $currency_select !!}
                                        @if ($errors->has('currency'))
                                            <span class="text-danger">{{ $errors->first('currency') }}</span>
                                        @endif
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

@endsection

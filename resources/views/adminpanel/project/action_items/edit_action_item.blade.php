@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Action Item</h4>
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

                        <form name="" method="post" action="{{url('update_action_item', $action_items->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Component</label>
                                        <label class="form-control">{{$action_items->component}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="action_item"> Action Item </label>
                                        <input type="text" name="action_item" value="{{$action_items->action_item}}" class="form-control" placeholder="Action Item">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="assigned_to"> Assigned To </label>
                                        <input type="text" name="assigned_to" value="{{$action_items->assigned_to}}" class="form-control" placeholder="Assigned To">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> Start Date</label>
                                        <input type="text" name="start_date" id="start_date" value="{{$action_items->start_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('start_date'))
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> End Date</label>
                                        <input type="text" name="end_date" id="end_date" value="{{$action_items->end_date}}" class="form-control datepicker" placeholder="MM/DD/YYYY" readonly>
                                        @if ($errors->has('end_date'))
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-warning pull-right">
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
@endsection

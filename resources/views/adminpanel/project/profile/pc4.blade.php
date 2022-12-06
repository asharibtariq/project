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
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px"
                                     role="alert">{{ $error }}</div>
                            @endforeach
                            @if(Session::has('success'))
                                <div class="col-md-12">
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                </div>
                            @endif
                        @endif

                        <form name="" method="post" action="{{url('add_pc4')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">PC-4 Preparation</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                <div class="form-group">
                                    <label
                                        for="exampleFormControlSelect1">Status</label>
                                    <input type="hidden" name="project_id" value="{{$project_id}}" />
                                    <input type="hidden" name="project_name" value="{{$project->name}}" />
                                    <select name="preparation_status" class="form-control select2"
                                            id="exampleFormControlSelect1">
                                        <option value="Complete">Complete</option>
                                        <option value="Incomplete">Incomplete</option>

                                    </select>
                                </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea  class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                  placeholder="Remarks"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">PC-4 Approval By Ministry</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlSelect1">Status</label>
                                        <select name="ministry_status" class="form-control select2"
                                                id="exampleFormControlSelect1">
                                            <option  value="Complete">Complete </option>
                                            <option value="Incomplete">Incomplete</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea name="ministry_remarks" class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                  placeholder="Remarks"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">PC-4 Approval By Planning</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlSelect1">Status</label>
                                        <select name="planning_status" class="form-control select2"
                                                id="exampleFormControlSelect1">
                                            <option value="complete">Complete </option>
                                            <option value="Incomplete">Incomplete</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea name="planning_remarks" class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                  placeholder="Remarks"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">Approval By New Posts By Finance Division</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlSelect1">Status</label>
                                        <select name="finance_status" class="form-control select2"
                                                id="exampleFormControlSelect1">
                                            <option value="complete">Complete </option>
                                            <option value="complete">Incomplete</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea name="finance_remarks" class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                  placeholder="Remarks"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br/>
                                    <h4 class="text-muted">Inclusion in Next Budget</h4>
                                    <hr/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlSelect1">Status</label>
                                        <select name="budget_status" class="form-control select2"
                                                id="exampleFormControlSelect1">
                                            <option value="complete">Complete </option>
                                            <option value="Incomplete">Incomplete</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea name="budget_remarks" class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                  placeholder="Remarks"></textarea>
                                    </div>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"> Add</i>
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

@endsection

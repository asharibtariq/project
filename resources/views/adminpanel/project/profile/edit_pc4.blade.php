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
                        <form name="" method="post" action="{{url('update_pc4', $project->id)}}" enctype="multipart/form-data">
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
                                    <input type="hidden" name="project_id" value="{{$project->project_id}}" />
                                    <input type="hidden" name="project_name" value="{{$project->project_name}}" />

                                    <select name="preparation_status" id="preparation_status" class="form-control select2">
                                        <option value="complete" @php echo $project->preparation_status == 'complete' ? 'selected' : ''; @endphp>Complete</option>
                                        <option value="incomplete" @php echo $project->preparation_status == 'incomplete' ? 'selected' : ''; @endphp>Incomplete</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea  class="form-control" name="preparation_remarks"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                   placeholder="Remarks">{{$project->preparation_remarks}}</textarea>
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
                                        <select name="ministry_status" id="ministry_status" class="form-control select2">
                                            <option value="complete" @php echo $project->ministry_status == 'complete' ? 'selected' : ''; @endphp>Complete</option>
                                            <option value="incomplete" @php echo $project->ministry_status == 'incomplete' ? 'selected' : ''; @endphp>Incomplete</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea name="ministry_remarks"  class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                  placeholder="Remarks">{{$project->ministry_remarks}}</textarea>
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
                                        <select name="planning_status" id="planning_status" class="form-control select2">
                                            <option value="complete" @php echo $project->planning_status == 'complete' ? 'selected' : ''; @endphp>Complete</option>
                                            <option value="incomplete" @php echo $project->planning_status == 'incomplete' ? 'selected' : ''; @endphp>Incomplete</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea name="planning_remarks" class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                    placeholder="Remarks">{{$project->planning_remarks}}</textarea>
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
                                        <select name="finance_status" id="finance_status" class="form-control select2">
                                            <option value="complete" @php echo $project->finance_status == 'complete' ? 'selected' : ''; @endphp>Complete</option>
                                            <option value="incomplete" @php echo $project->finance_status == 'incomplete' ? 'selected' : ''; @endphp>Incomplete</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea name="finance_remarks" class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                  placeholder="Remarks" >{{$project->finance_remarks}}</textarea>
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
                                        <select name="budget_status" id="budget_status" class="form-control select2">
                                            <option value="complete" @php echo $project->budget_status == 'complete' ? 'selected' : ''; @endphp>Complete</option>
                                            <option value="incomplete" @php echo $project->budget_status == 'incomplete' ? 'selected' : ''; @endphp>Incomplete</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Remarks/
                                            issues/Bottlenecks (if any)</label>
                                        <textarea name="budget_remarks" class="form-control"
                                                  id="exampleFormControlTextarea1" rows="3"
                                                  placeholder="Remarks" >{{$project->budget_remarks}}</textarea>
                                    </div>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"><br/>
                                        <button type="submit" class="btn btn-info pull-right">
                                            <i class="fa fa-check"> Update Pc4</i>
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

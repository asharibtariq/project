@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Project</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form name="" method="post" action="{{url('add_project')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="psdp">PSDP</label>
                                        <input type="text" name="psdp" id="psdp" class="form-control input-paf" placeholder="PSDP#" minlength="3" required />
                                        @if ($errors->has('psdp'))
                                            <span class="text-danger">{{ $errors->first('psdp') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="psid">ID</label>
                                        <input type="text" name="psid" id="psid" class="form-control input-paf" placeholder="ID#" minlength="3" required />
                                        @if ($errors->has('psid'))
                                            <span class="text-danger">{{ $errors->first('psid') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control input-paf" placeholder="Name" minlength="3" required />
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="cost">Total Cost</label>
                                        <input type="text" name="cost" id="cost" class="form-control input-paf" placeholder="Cost" minlength="3" required />
                                        @if ($errors->has('cost'))
                                            <span class="text-danger">{{ $errors->first('cost') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="complete_date">Completion Date (<small class="text-muted">As per PC-I</small>)</label>
                                        <input type="text" name="complete_date" id="complete_date" class="form-control input-paf datepicker" placeholder="MM/DD/YYYY" readonly required />
                                        @if ($errors->has('complete_date'))
                                            <span class="text-danger">{{ $errors->first('complete_date') }}</span>
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

@endsection
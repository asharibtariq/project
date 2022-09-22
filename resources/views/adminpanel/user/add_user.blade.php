@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add User</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                                @if(Session::has('success'))
                                    <div class="col-md-12">
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                    </div>
                                @endif
                        @endif

                        <form name="" method="post" action="{{url('add_user')}}">
                            @csrf
                            <div class="row">
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
                                        <label class="label-paf" for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control input-paf" placeholder="Username" minlength="3" required />
                                        @if ($errors->has('username'))
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control input-paf" placeholder="Password" minlength="8" required />
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control input-paf" placeholder="Email ID" required />
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="role_id">Role</label>
                                        {!! $role_select !!}
                                        <input type="hidden" name="role" id="role" >
                                        @if ($errors->has('role'))
                                            <span class="text-danger">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="project_id">Project(s)</label>
                                        {!! $multiple_project_select !!}
                                        <input type="hidden" name="project" id="project" >
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
        $(document).ready(function () {
            $(document).on('change', '#role_id', function () {
                var role_id = $(this).val();
                if (role_id > 0){
                    var role = $("#role_id option:selected").text();
                    $("#role").val(role);
                }
            });
        });
    </script>

@endsection
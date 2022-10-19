@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" style="margin: 6px; padding: 10px" role="alert">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form method="post" action="{{url('update_user', $user->id)}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{--<input type="hidden" name="_method" value="PUT">--}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="name">Name</label>
                                        <input type="text"
                                               name="name"
                                               id="name"
                                               class="form-control input-paf"
                                               placeholder="Name"
                                               minlength="3"
                                               value="{{ $user->name}}"
                                               required />
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="username">Username</label>
                                        <input type="text"
                                               name="username"
                                               id="username"
                                               class="form-control input-paf"
                                               placeholder="Username"
                                               minlength="3"
                                               value="{{ $user->username}}"
                                               required />
                                        @if ($errors->has('username'))
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="password">Password</label>
                                        <input type="password"
                                               name="password"
                                               id="password"
                                               class="form-control input-paf"
                                               placeholder="Password"
                                               minlength="8" />
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="email">Email</label>
                                        <input type="email"
                                               name="email"
                                               id="email"
                                               class="form-control input-paf"
                                               placeholder="email"
                                               minlength="3"
                                               value="{{ $user->email}}"
                                               required />
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="role_id">Role</label>
                                        {!! $role_select !!}
                                        <input type="hidden" name="role" id="role" value="{{ $user->role}}">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-paf" for="status">Status</label>
                                        <select class="form-control input-paf" name="status" id="status">
                                            <option value="Y" {{$user->status == "Y" ? "selected" : ""}}>Active</option>
                                            <option value="N" {{$user->status == "N" ? "selected" : ""}}>In-Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="label-paf" for="btn_submit"> &nbsp; </label>
                                        <button type="submit" id="btn_submit" class="btn btn-info">
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
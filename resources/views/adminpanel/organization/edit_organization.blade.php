@extends('layouts.app')
@section('content')

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">

                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="organization">Organization List</a></li>
                        <li class="breadcrumb-item"><a href="edit_organization">Edit Organization</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->

    <!-- Add Project Content Start-->

    <div class="row">
        <!-- [ form-element ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Organization</h5>
                </div>
                <form class="card-body" method="post" action="{{url('update_organization', $organization->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" value="{{$organization->name}}" class="form-control"
                                       placeholder="Enter Name">
                            </div>
                        </div>

                    </div>

                    <br>

                    <!-- Reports Remarks ends -->

                    <div class="">
                        <button type="submit" class="btn btn-info "><i class="feather icon-check"></i>Enter</button>
                    </div>

                </form>
            </div>
            <!-- Input group -->

        </div>
        <!-- [ form-element ] end -->
        <!-- [ Main Content ] end -->
    </div>
    </div>
@endsection
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
                    <li class="breadcrumb-item"><a href="designation">Designation List</a></li>
                    <li class="breadcrumb-item"><a href="add_designation">Add Designation</a></li>
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
                <h5>Add Designation</h5>
            </div>
            <form class="card-body">

                <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" class="form-control"
                                       placeholder="Enter Id">
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control"
                                       placeholder="Enter Name">
                            </div>


                    </div>
                </div>



                <br>

                <!-- Reports Remarks ends -->

                <div class="text-center">
                    <button type="button" class="btn btn-info "><i class="feather icon-check"></i>Enter</button>
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
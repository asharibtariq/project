@extends('layouts.app')
@section('content')
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">

                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i
                                            class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="text-center">
            <h2>
                WELCOME TO PROJECT MONITORING SYSTEM
            </h2>
        </div>
        <HR>
        <div class="container-fluid">

            <form>
                <div class="row">
                    <div class="col-md-4">



                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" class="form-control"
                                   placeholder="DD/MM/YY">
                        </div>




                    </div>

                    <div class="col-md-4">



                        <div class="form-group">
                            <label>End Date </label>
                            <input type="text" class="form-control"
                                   placeholder="DD/MM/YY">
                        </div>


                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="">  </label>
                            <button type="button" class="btn btn-info "><i class="feather icon-check"></i>Search</button>

                        </div>



                    </div>
                </div>
            </form>

        </div>

        <hr>

        <div class="row">


            <!-- product profit start -->
            <div class="col-xl-4 col-md-12">
                <div class="card prod-p-card bg-c-red">
                    <div class="card-body">
                        <div class="row align-items-center m-b-25">
                            <div class="col">
                                <h3 class="m-b-5 text-white">Total Projects</h3>
                                <h3 class="m-b-0 text-white">00</h3>
                            </div>

                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                            </div>
                        </div>
                        <p class="m-b-0 text-white">Currently Active Projects</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card prod-p-card bg-c-blue ">
                    <div class="card-body">
                        <div class="row align-items-center m-b-25">
                            <div class="col">
                                <h3 class="m-b-5 text-white">Total Allocations</h3>
                                <h3 class="m-b-0 text-white">00</h3>
                            </div>

                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt text-c-blue f-18"></i>
                            </div>
                        </div>
                        <p class="m-b-0 text-white">From Previous
                            Month</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card prod-p-card bg-c-yellow ">
                    <div class="card-body">
                        <div class="row align-items-center m-b-25">
                            <div class="col">
                                <h3 class="m-b-5 text-white">Total Release</h3>
                                <h3 class="m-b-0 text-white">00</h3>
                            </div>

                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt text-c-yellow f-18"></i>
                            </div>
                        </div>
                        <p class="m-b-0 text-white">Total Project
                            Releases</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card prod-p-card bg-c-green">
                    <div class="card-body">
                        <div class="row align-items-center m-b-25">
                            <div class="col">
                                <h3 class="m-b-5 text-white">Total Utilization</h3>
                                <h3 class="m-b-0 text-white">00</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign text-c-green f-18"></i>
                            </div>
                        </div>
                        <p class="m-b-0 text-white">Total Project
                            Utilization</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card prod-p-card bg-c-info">
                    <div class="card-body">
                        <div class="row align-items-center m-b-25">
                            <div class="col">
                                <h3 class="m-b-5 text-white">Financial Percentage</h3>
                                <h3 class="m-b-0 text-white">0.00%</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tags text-c-info f-18"></i>
                            </div>
                        </div>
                        <p class="m-b-0 text-white">Total Active Projects
                            Financial Percentage </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- sessions-section start -->
        <div class="card table-card">
            <div class="card-header">
                <h5>Site visitors session log</h5>
            </div>
            <div class="card-body px-0 py-0">

                <div style="position:relative;">
                    <div id="morris-bar-chart" style="height:300px"></div>
                </div>

            </div>
        </div>
        <!-- sessions-section end -->
@endsection
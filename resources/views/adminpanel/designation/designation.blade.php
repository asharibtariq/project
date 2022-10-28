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
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<!-- [ Hover-table ] start -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Designation</h5>
            <a href="add_designation" type="button" class="btn btn-lg btn-success btn-sm"> Add Designation</a>

        </div>
        <div class="card-body table-border-style">

            <div class="row">
                <div class="col-md-3">
                    <div class="input-group md-form form-sm form-2 pl-0">
                        <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Name" aria-label="Search">
                        <div class="input-group-append">
                                              <span class="input-group-text amber lighten-3" id="basic-text1"> <i class="fas fa-search text-grey"
                                                                                                                  aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="btn-group mb-2 mr-2">
                <button class="btn btn-sm btn-outline-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entries</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#!">10</a>
                    <a class="dropdown-item" href="#!">20</a>
                    <a class="dropdown-item" href="#!">50</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>0101</td>
                        <td>Name</td>
                        <td> <a href="" type="button" class="btn btn-success btn-sm">Active</a> </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-sm btn-success">Edit</button>
                                <button type="button" class="btn btn-sm btn-info">Delete</button>
                            </div>
                        </td>

                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
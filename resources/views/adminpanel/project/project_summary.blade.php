@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if(Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="card">
                    <div class="card-header">
                        <h4>Project Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            @php
                                $fiscal_year_start = $project->fiscal_year - 1;
                                $fiscal_year = $fiscal_year_start." - ".$project->fiscal_year;
                            @endphp

                            <div class="col-md-6">
                                <h4><strong class="text-muted">Name:</strong> <span
                                            class="float-right">{{$project->name}}</span></h4>
                                <h4><strong class="text-muted">ID:</strong> <span
                                            class="float-right">{{$project->psid}}</span></h4>
                                <h4><strong class="text-muted">Approval Type:</strong> <span
                                            class="float-right">{{$project->approval_type}}</span></h4>
                                <h4><strong class="text-muted">Executive Agency:</strong> <span
                                            class="float-right">{{$project->executiveagency}}</span></h4>
                                <h4><strong class="text-muted">Start Date:</strong> <span
                                            class="float-right">{{$project->start_date}}</span></h4>
                            </div>
                            <div class="col-md-6">
                                <h4><strong class="text-muted">PSDP:</strong> <span
                                            class="float-right">{{$project->psdp}}</span></h4>
                                <h4><strong class="text-muted">Fiscal Year:</strong> <span
                                            class="float-right">{{$fiscal_year}}</span></h4>
                                <h4><strong class="text-muted">Approval Date:</strong> <span
                                            class="float-right">{{$project->approval_date}}</span></h4>
                                <h4><strong class="text-muted">Forum:</strong> <span
                                            class="float-right">{{$project->forum}}</span></h4>
                                <h4><strong class="text-muted">End Date:</strong> <span
                                            class="float-right">{{$project->end_date}}</span></h4>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div> {{--Project Details--}}
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="card">
                    <div class="card-header">
                        <h4>Project Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            @php
                                $fiscal_year_start = $project->fiscal_year - 1;
                                $fiscal_year = $fiscal_year_start." - ".$project->fiscal_year;
                            @endphp

                            <h6> {{--10.--}} Fiscal Year Wise Allocation </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Date</th>
                                        <th data-column-index="3"> Amount Allocated</th>
                                        <th data-column-index="3"> Foreign Aid</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> 2022-2023</td>
                                        <td> 13-11-2022</td>
                                        <td> 1200000 PKR</td>
                                        <td> 10000$</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--11.--}} Fiscal Year Wise Release </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Quarter</th>
                                        <th data-column-index="3"> Date</th>
                                        <th data-column-index="3"> Amount Released</th>
                                        <th data-column-index="3"> Foreign Aid Released</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> 2022-2023</td>
                                        <td> First Quarter</td>
                                        <td> 13-11-2022</td>
                                        <td> 1200000 PKR</td>
                                        <td> 10000$</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--12.--}} Fiscal Year Wise Utilization </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="1"> Quarter</th>
                                        <th data-column-index="3"> Date</th>
                                        <th data-column-index="1"> Component</th>
                                        <th data-column-index="3"> Amount Utilized</th>
                                        <th data-column-index="3"> Foreign Aid Utilized</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> 2022-2023</td>
                                        <td> First Quarter</td>
                                        <td> 13-11-2022</td>
                                        <td> Component</td>
                                        <td> 1200000 PKR</td>
                                        <td> 10000$</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--13.--}} Component Wise Breakup of Approved Budget in PC1</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Amount</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> 2022-2023</td>
                                        <td> Furniture</td>
                                        <td> 1200000 PKR</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--14.--}} Year wise breakup of budget as per NIS</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Amount</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> 2022-2023</td>
                                        <td> Furniture</td>
                                        <td> 1200000 PKR</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--15.--}} Project Physical Targets </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Physical Target Description</th>
                                        <th data-column-index="3"> Allocated Budget</th>
                                        <th data-column-index="3"> Planned Start Date</th>
                                        <th data-column-index="3"> Planned End Date</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> 2022-2023</td>
                                        <td> 13-11-2022</td>
                                        <td> 1200000 PKR</td>
                                        <td> 10000$</td>
                                        <td> 1200000 PKR</td>
                                        <td> 10000$</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--16.--}} PC-4 Details</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> Physcial Target Description</th>
                                        <th data-column-index="3"> Status(Complete/incomplete)</th>
                                        <th data-column-index="3"> Remarks</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> PC-IV Preparation</td>
                                        <td> insert text here</td>
                                        <td> insert text here</td>
                                    </tr>
                                    <tr role="row">
                                        <td> 2</td>
                                        <td> PC-IV approval by Ministry</td>
                                        <td> insert text here</td>
                                        <td> insert text here</td>
                                    </tr>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> PC-IV approval by Planning</td>
                                        <td> insert text here</td>
                                        <td> insert text here</td>
                                    </tr>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Approval of new posts by Finance Division</td>
                                        <td> insert text here</td>
                                        <td> insert text here</td>
                                    </tr>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Inclusion in next year's budget</td>
                                        <td> insert text here</td>
                                        <td> insert text here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--17. --}}End of Fiscal Year</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Date</th>
                                        <th data-column-index="3"> Amount Surrendered</th>
                                        <th data-column-index="3"> Amount Lapsed</th>
                                        <th data-column-index="3"> Financial Progress</th>
                                        <th data-column-index="3"> Physical Progress</th>
                                        <th data-column-index="3"> Remarks</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>{{--Project Profile--}}
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="card">
                    <div class="card-header">
                        <h4> Project Status </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h6> {{--18. --}}Completed Physical Targets </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Physical Target Description</th>
                                        <th data-column-index="3"> Allocated Budget</th>
                                        <th data-column-index="3"> Consumed Budget</th>
                                        <th data-column-index="3"> Actual Start Date</th>
                                        <th data-column-index="3"> Actual End Date</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--19. --}}Previous Physical Targets not achieved till to date</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Physical Target Description</th>
                                        <th data-column-index="3"> Budget Required</th>
                                        <th data-column-index="3"> Planned Start Date</th>
                                        <th data-column-index="3"> Planned End Date</th>
                                        <th data-column-index="3"> Reason</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--20. --}}Ongoing Physical Targets</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Physical Target Description</th>
                                        <th data-column-index="3"> Budget Required</th>
                                        <th data-column-index="3"> Actual Start Date</th>
                                        <th data-column-index="3"> Actual End Date</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--21.--}} Financial Progress</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Physical Target Description</th>
                                        <th data-column-index="3"> Amount</th>
                                        <th data-column-index="3"> Date</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--22. --}}Physical Progress</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Date</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Physical Target Description</th>
                                        <th data-column-index="3"> Progress Detail</th>
                                        <th data-column-index="3"> Pictorial/Video Evidence Annex Reference</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{--Project Status--}}
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="card">
                    <div class="card-header">
                        <h4>Project Monitoring</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h6> {{--23.--}} Ongoing Physical Targets.</h6>
                            <h6> {{--a.--}} Physical Target description</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Physical Target Description</th>
                                        <th data-column-index="3"> Budget Required</th>
                                        <th data-column-index="3"> Actual Start Date</th>
                                        <th data-column-index="3"> Actual End Date</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6> {{--b.--}} Physical Target Status </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> Date</th>
                                        <th data-column-index="3"> Pace (Slow/On track/Fast)</th>
                                        <th data-column-index="3"> Status (In Process/Complete/Halted)</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--c.--}} Financial Progress </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Date</th>
                                        <th data-column-index="3"> Amount Spent</th>
                                        <th data-column-index="3"> Instrumental Detail</th>
                                        <th data-column-index="3"> Instrument Annex ref</th>
                                        <th data-column-index="3"> Unpaid Liability</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--d. --}}Physical Progress</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> FY</th>
                                        <th data-column-index="3"> Date</th>
                                        <th data-column-index="3"> Progress Detail</th>
                                        <th data-column-index="3"> Pictorial Evidence Annex ref</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <hr/>
                            </div>

                            <h6> {{--f. --}}Action Items </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> Date</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Action Item</th>
                                        <th data-column-index="3"> Assigned to (if required)</th>
                                        <th data-column-index="3"> Start Date (if required)</th>
                                        <th data-column-index="3"> End Date (if required)</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{--Project Monitoring--}}
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="card">
                    <div class="card-header">
                        <h4>Issues & Suggestions</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h6> {{--24.--}} Issues </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="1"> Component</th>
                                        <th data-column-index="3"> Issues</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6> {{--25.--}} Suggestions </h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> Sr#</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Suggestions</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Insert Text Here</td>
                                        <td> Insert Text Here</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{--Issues/Suggestions--}}
    </div>
@endsection

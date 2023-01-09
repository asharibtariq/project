@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="print-btn-div">
                    <button id="print-btn" title="Print Summary" class="btn btn-sm btn-default float-right">
                        <i class="fa fa-print"></i>
                    </button>
                 </div>
            </div>
        </div>
    </div>

    <div class="container" id="print-summary">
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
                                <h4><strong class="text-muted">Name:</strong> <span class="float-right">{{$project->name}}</span></h4>
                                <h4><strong class="text-muted">ID:</strong> <span class="float-right">{{$project->psid}}</span></h4>
                                <h4><strong class="text-muted">Approval Type:</strong> <span class="float-right">{{$project->approval_type}}</span></h4>
                                <h4><strong class="text-muted">Executive Agency:</strong> <span class="float-right">{{$project->executiveagency}}</span></h4>
                                <h4><strong class="text-muted">Start Date:</strong> <span class="float-right">{{$project->start_date}}</span></h4>
                            </div>
                            <div class="col-md-6">
                                <h4><strong class="text-muted">PSDP:</strong> <span class="float-right">{{$project->psdp}}</span></h4>
                                <h4><strong class="text-muted">Fiscal Year:</strong> <span class="float-right">{{$fiscal_year}}</span></h4>
                                <h4><strong class="text-muted">Approval Date:</strong> <span class="float-right">{{$project->approval_date}}</span></h4>
                                <h4><strong class="text-muted">Forum:</strong> <span class="float-right">{{$project->forum}}</span></h4>
                                <h4><strong class="text-muted">End Date:</strong> <span class="float-right">{{$project->end_date}}</span></h4>
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
                        <h4>Project Director</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><strong class="text-muted">Name:</strong> <span class="float-right">{{$project_pd->name != '' ? $project_pd->name : ''}}</span></h4>
                                <h4><strong class="text-muted">Email ID:</strong> <span class="float-right">{{$project_pd->email != '' ? $project_pd->email : ''}}</span></h4>
                                <h4><strong class="text-muted">W.E.F Date:</strong> <span class="float-right">{{$project_pd->wef_date != '' ? $project_pd->wef_date : ''}}</span></h4>
                            </div>
                            <div class="col-md-6">
                                <h4><strong class="text-muted">Designation:</strong> <span class="float-right">{{$project_pd->designation != '' ? $project_pd->designation : ''}}</span></h4>
                                <h4><strong class="text-muted">Phone Number:</strong> <span class="float-right">{{$project_pd->phone_no != '' ? $project_pd->phone_no : ''}}</span></h4>
                                <h4><strong class="text-muted">Mobile Number:</strong> <span class="float-right">{{$project_pd->cell_number != '' ? $project_pd->cell_number : ''}}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{--Project Director--}}
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="card">
                    <div class="card-header">
                        <h4>Project Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
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
                                    @php
                                        $project_allocation = json_decode($project_allocation)
                                    @endphp
                                    <?php
                                    if (!empty($project_allocation)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_allocation as $allocation){
                                    ?>
                                    @php
                                        $fiscal_year_start = $allocation->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$allocation->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$allocation->alloc_date}}</td>
                                        <td> {{$allocation->alloc_amount}} (<small class="text-muted">PKR</small>)</td>
                                        <td> {{$allocation->foreign_alloc_amount}} (<small class="text-muted">{{$allocation->currency}}</small>)</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="5" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $project_release = json_decode($project_release)
                                    @endphp
                                    <?php
                                    if (!empty($project_release)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_release as $release){
                                    ?>
                                    @php
                                        $fiscal_year_start = $release->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$release->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$release->quarter}}</td>
                                        <td> {{$release->release_date}}</td>
                                        <td> {{$release->rel_amount}}</td>
                                        <td> {{$release->foreign_rel_amount}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="6" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                        <th data-column-index="3"> Quarter</th>
                                        <th data-column-index="3"> Date</th>
                                        <th data-column-index="3"> Component</th>
                                        <th data-column-index="3"> Amount Utilized</th>
                                        <th data-column-index="3"> Foreign Aid Utilized</th>
                                    </thead>
                                    <tbody>
                                    @php
                                        $project_fy_utilization = json_decode($project_fy_utilization)
                                    @endphp
                                    <?php
                                    if (!empty($project_fy_utilization)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_fy_utilization as $fy_utilization){
                                    ?>
                                    @php
                                        $fiscal_year_start = $fy_utilization->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$fy_utilization->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$fy_utilization->quarter}}</td>
                                        <td> {{$fy_utilization->fy_date}}</td>
                                        <td> {{$fy_utilization->component}}</td>
                                        <td> {{$fy_utilization->fy_amount}}</td>
                                        <td> {{$fy_utilization->foreign_fy_amount}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="7" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $project_component_pc1 = json_decode($project_component_pc1)
                                    @endphp
                                    <?php
                                    if (!empty($project_component_pc1)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_component_pc1 as $component_pc1){
                                    ?>
                                    @php
                                        $fiscal_year_start = $component_pc1->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$component_pc1->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$component_pc1->component}}</td>
                                        <td> {{$component_pc1->comp_amount}} (<small class="text-muted">{{$component_pc1->currency}}</small>)</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="4" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $project_component_nis = json_decode($project_component_nis)
                                    @endphp
                                    <?php
                                    if (!empty($project_component_nis)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_component_nis as $component_nis){
                                    ?>
                                    @php
                                        $fiscal_year_start = $component_nis->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$component_nis->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$component_nis->component}}</td>
                                        <td> {{$component_nis->comp_amount}} (<small class="text-muted">{{$component_pc1->currency}}</small>)</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="4" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $project_physical_target = json_decode($project_physical_target)
                                    @endphp
                                    <?php
                                    if (!empty($project_physical_target)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_physical_target as $physical_target){
                                    ?>
                                    @php
                                        $fiscal_year_start = $physical_target->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$physical_target->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$physical_target->component}}</td>
                                        <td> {{$physical_target->physical_description}}</td>
                                        <td> {{$physical_target->amount}} (<small class="text-muted">{{$physical_target->currency}}</small>)</td>
                                        <td> {{$physical_target->start_date}}</td>
                                        <td> {{$physical_target->end_date}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="7" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                        <th data-column-index="3"> Status</th>
                                        <th data-column-index="3"> Remarks</th>
                                    </thead>
                                    <tbody>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> PC-IV Preparation</td>
                                        <td> {{$project_pc4->preparation_status != '' ? $project_pc4->preparation_status : '-'}}</td>
                                        <td> {{$project_pc4->preparation_remarks != '' ? $project_pc4->preparation_remarks : '-'}}</td>
                                    </tr>
                                    <tr role="row">
                                        <td> 2</td>
                                        <td> PC-IV approval by Ministry</td>
                                        <td> {{$project_pc4->ministry_status != '' ? $project_pc4->ministry_status : '-'}}</td>
                                        <td> {{$project_pc4->ministry_remarks != '' ? $project_pc4->ministry_remarks : '-'}}</td>
                                    </tr>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> PC-IV approval by Planning</td>
                                        <td> {{$project_pc4->planning_status != '' ? $project_pc4->planning_status : '-'}}</td>
                                        <td> {{$project_pc4->planning_remarks != '' ? $project_pc4->planning_remarks : '-'}}</td>
                                    </tr>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Approval of new posts by Finance Division</td>
                                        <td> {{$project_pc4->finance_status != '' ? $project_pc4->finance_status : '-'}}</td>
                                        <td> {{$project_pc4->finance_remarks != '' ? $project_pc4->finance_remarks : '-'}}</td>
                                    </tr>
                                    <tr role="row">
                                        <td> 1</td>
                                        <td> Inclusion in next year's budget</td>
                                        <td> {{$project_pc4->budget_status != '' ? $project_pc4->budget_status : '-'}}</td>
                                        <td> {{$project_pc4->budget_remarks != '' ? $project_pc4->budget_remarks : '-'}}</td>
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
                                    @php
                                        $project_end_of_fy = json_decode($project_end_of_fy)
                                    @endphp
                                    <?php
                                    if (!empty($project_end_of_fy)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_end_of_fy as $end_of_fy){
                                    ?>
                                    @php
                                        $fiscal_year_start = $end_of_fy->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$end_of_fy->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$end_of_fy->date}}</td>
                                        <td> {{$end_of_fy->local_amount_surrender}} (<small class="text-muted">{{$end_of_fy->currency_surrender}}</small>)</td>
                                        <td> {{$end_of_fy->local_amount_lapsed}} (<small class="text-muted">{{$end_of_fy->currency_lapsed}}</small>)</td>
                                        <td> {{$end_of_fy->financial_progress}}</td>
                                        <td> {{$end_of_fy->physical_progress}}</td>
                                        <td> {{$end_of_fy->remarks}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="8" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $completed_project_physical_target = json_decode($completed_project_physical_target)
                                    @endphp
                                    <?php
                                    if (!empty($completed_project_physical_target)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($completed_project_physical_target as $completed_physical_target){
                                    ?>
                                    @php
                                        $fiscal_year_start = $completed_physical_target->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$completed_physical_target->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$completed_physical_target->component}}</td>
                                        <td> {{$completed_physical_target->physical_description}}</td>
                                        <td> {{$completed_physical_target->amount}} (<small class="text-muted">{{$completed_physical_target->currency}}</small>)</td>
                                        <td> {{$completed_physical_target->amount}} (<small class="text-muted">{{$completed_physical_target->currency}}</small>)</td>
                                        <td> {{$completed_physical_target->start_date}}</td>
                                        <td> {{$completed_physical_target->end_date}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="8" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $not_achieved_project_physical_target = json_decode($not_achieved_project_physical_target)
                                    @endphp
                                    <?php
                                    if (!empty($not_achieved_project_physical_target)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($not_achieved_project_physical_target as $not_achieved_physical_target){
                                    ?>
                                    @php
                                        $fiscal_year_start = $not_achieved_physical_target->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$not_achieved_physical_target->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$not_achieved_physical_target->component}}</td>
                                        <td> {{$not_achieved_physical_target->physical_description}}</td>
                                        <td> {{$not_achieved_physical_target->amount}} (<small class="text-muted">{{$not_achieved_physical_target->currency}}</small>)</td>
                                        <td> {{$not_achieved_physical_target->start_date}}</td>
                                        <td> {{$not_achieved_physical_target->end_date}}</td>
                                        <td> {{$not_achieved_physical_target->reason}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="8" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $on_going_project_physical_target = json_decode($on_going_project_physical_target)
                                    @endphp
                                    <?php
                                    if (!empty($on_going_project_physical_target)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($on_going_project_physical_target as $on_going_physical_target){
                                    ?>
                                    @php
                                        $fiscal_year_start = $on_going_physical_target->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$on_going_physical_target->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$on_going_physical_target->component}}</td>
                                        <td> {{$on_going_physical_target->physical_description}}</td>
                                        <td> {{$on_going_physical_target->amount}} (<small class="text-muted">{{$on_going_physical_target->currency}}</small>)</td>
                                        <td> {{$on_going_physical_target->start_date}}</td>
                                        <td> {{$on_going_physical_target->end_date}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="7" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $project_financial_progress = json_decode($project_financial_progress)
                                    @endphp
                                    <?php
                                    if (!empty($project_financial_progress)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_financial_progress as $financial_progress){
                                    ?>
                                    @php
                                        $fiscal_year_start = $financial_progress->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$financial_progress->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$financial_progress->component}}</td>
                                        <td> {{$financial_progress->physical_description}}</td>
                                        <td> {{$financial_progress->amount}}</td>
                                        <td> {{$financial_progress->date}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="6" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $project_physical_progress = json_decode($project_physical_progress)
                                    @endphp
                                    <?php
                                    if (!empty($project_physical_progress)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_physical_progress as $physical_progress){
                                    ?>
                                    @php
                                        $fiscal_year_start = $physical_progress->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$physical_progress->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$physical_progress->date}}</td>
                                        <td> {{$physical_progress->component}}</td>
                                        <td> {{$physical_progress->physical_description}}</td>
                                        <td> {{$physical_progress->progress_detail}}</td>
                                        <td> <a class="fa fa-file-image" href="#" target="_blank"></a> Pictorial/Video Evidence Annex Reference</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="7" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                            <h6> {{--a.--}} Physical Target description</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr role="row">
                                        <th data-column-index="0"> FY</th>
                                        <th data-column-index="1"> Component</th>
                                        <th data-column-index="3"> Physical Target Description</th>
                                        <th data-column-index="3"> Budget Required</th>
                                        <th data-column-index="3"> Actual Start Date</th>
                                        <th data-column-index="3"> Actual End Date</th>
                                    </thead>
                                    <tbody>
                                    @php
                                    //    $on_going_project_physical_target = json_decode($on_going_project_physical_target)
                                    @endphp
                                    <?php
                                    if (!empty($on_going_project_physical_target)){
                                    ?>
                                    <?php
                                    foreach ($on_going_project_physical_target as $on_going_physical_target){
                                    ?>
                                    @php
                                        $fiscal_year_start = $on_going_physical_target->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$on_going_physical_target->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$on_going_physical_target->component}}</td>
                                        <td> {{$on_going_physical_target->physical_description}}</td>
                                        <td> {{$on_going_physical_target->amount}} (<small class="text-muted">{{$on_going_physical_target->currency}}</small>)</td>
                                        <td> {{$on_going_physical_target->start_date}}</td>
                                        <td> {{$on_going_physical_target->end_date}}</td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="6" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                        <th data-column-index="3"> Pace</th>
                                        <th data-column-index="3"> Status</th>
                                    </thead>
                                    <tbody>
                                    @php
                                        $project_physical_target_status = json_decode($project_physical_target_status)
                                    @endphp
                                    <?php
                                    if (!empty($project_physical_target_status)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_physical_target_status as $physical_target_status){
                                    ?>
                                    @php
                                        $fiscal_year_start = $physical_target_status->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$physical_target_status->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$physical_target_status->date}}</td>
                                        <td> {{$physical_target_status->pace}}</td>
                                        <td> {{$physical_target_status->status}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="4" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                    //    $project_financial_progress = json_decode($project_financial_progress)
                                    @endphp
                                    <?php
                                    if (!empty($project_financial_progress)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_financial_progress as $financial_progress){
                                    ?>
                                    @php
                                        $fiscal_year_start = $financial_progress->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$financial_progress->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$financial_progress->date}}</td>
                                        <td> {{$financial_progress->amount_spent}}</td>
                                        <td> {{$financial_progress->instrument_detail}}</td>
                                        <td> {{$financial_progress->file}}</td>
                                        <td> {{$financial_progress->amount_unpaid}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="7" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                    //    $project_physical_progress = json_decode($project_physical_progress)
                                    @endphp
                                    <?php
                                    if (!empty($project_physical_progress)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_physical_progress as $physical_progress){
                                    ?>
                                    @php
                                        $fiscal_year_start = $physical_progress->fiscal_year - 1;
                                        $fiscal_year = $fiscal_year_start." - ".$physical_progress->fiscal_year;
                                    @endphp
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$fiscal_year}}</td>
                                        <td> {{$physical_progress->date}}</td>
                                        <td> {{$physical_progress->progress_detail}}</td>
                                        <td> Pictorial Evidence Annex ref</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="5" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                        <th data-column-index="3"> Assigned to</th>
                                        <th data-column-index="3"> Start Date</th>
                                        <th data-column-index="3"> End Date</th>
                                    </thead>
                                    <tbody>
                                    @php
                                        $project_action_items = json_decode($project_action_items)
                                    @endphp
                                    <?php
                                    if (!empty($project_action_items)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_action_items as $action_items){
                                    ?>
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$action_items->date}}</td>
                                        <td> {{$action_items->component}}</td>
                                        <td> {{$action_items->action_item}}</td>
                                        <td> {{$action_items->assigned_to}}</td>
                                        <td> {{$action_items->start_date}}</td>
                                        <td> {{$action_items->end_date}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="7" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $project_issues = json_decode($project_issues)
                                    @endphp
                                    <?php
                                    if (!empty($project_issues)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_issues as $issues){
                                    ?>
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$issues->component}}</td>
                                        <td> {{$issues->description}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="3" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
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
                                    @php
                                        $project_suggest = json_decode($project_suggest)
                                    @endphp
                                    <?php
                                    if (!empty($project_suggest)){
                                    $i = 1;
                                    ?>
                                    <?php
                                    foreach ($project_suggest as $suggest){
                                    ?>
                                    <tr role="row">
                                        <td> {{$i}}</td>
                                        <td> {{$suggest->component}}</td>
                                        <td> {{$suggest->description}}</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                    <?php
                                    }else{
                                    ?>
                                    <tr role="row">
                                        <td colspan="3" class="text-center"> No Data Found </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{--Issues/Suggestions--}}
    </div>

    <script src="{{ asset('js/jquery.print.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#print-btn').on('click', function () {
                $.print("#print-summary");
            });
        });
    </script>
@endsection

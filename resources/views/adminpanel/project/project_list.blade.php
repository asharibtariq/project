<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
       aria-describedby="sample_1_info">
    <thead>
    <tr role="row">
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> Sr#</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="1"> PSDP</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> ID</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Name</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Approval Type</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Fiscal Year</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Executive Agency</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Approval Date</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Cost</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Forum</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Start Date</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> End Date</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Status</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Operation</th>
    </thead>
    <tbody>

    @php
        $i = 1;
    @endphp
    @if(is_array($result) && count($result) > 0)
        @foreach ($result as $r)

            <tr role="row">
                <td> {{$i}} </td>
                <td> {{$r->psdp}} </td>
                <td> {{$r->psid}} </td>
                <td> {{$r->name}} </td>
                <td> {{$r->approval_type}} </td>
                <td> {{$r->fiscal_year}} </td>
                <td> {{$r->executiveagency}} </td>
                <td> {{$r->approval_date}} </td>
                <td> {{$r->cost}} (<small class="text-muted">{{$r->currency}}</small>)</td>
                <td> {{$r->forum}} </td>
                <td> {{$r->start_date}} </td>
                <td> {{$r->end_date}} </td>
                <td>
                    @if($r->status == 'Y')
                        <button type="button" class="btn btn-primary">Active</button>
                    @elseif($r->status == 'N')
                        <button type="button" class="btn btn-danger">In-active</button>
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{url('add_project_director', $r->id)}}" class="btn btn-success" title="Project Profile" id="btn-view"><i class="fa fa-list"></i> </a>
                        <a href="{{url('completed_physical_targets', $r->id)}}" class="btn btn-info" title="Project Status" id="btn-view"><i class="fa fa-list"></i> </a>
                        <a href="#" class="btn btn-primary" title="Project Monitoring" id="btn-view"><i class="fa fa-list"></i> </a>
                        <a onClick="return confirm('Are you sure you want to update?');" title="Edit" href="{{url('edit_project', $r->id)}}" class="btn btn-warning" id="btn-view"><i class="fa fa-edit"></i> </a>
                        <a href="{{url('project_summary', $r->id)}}" title="Summary" class="btn btn-success"><i class="fa fa-file-archive"></i> </a>
                        <a onClick="return confirm('Are you sure you want to delete?');" title="Delete" href="{{url('delete_project', $r->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                    </div>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    @else
        <tr>
            <th scope="row" colspan="15">
                <div style="color:#FFFFFF;text-align: center; background-color: #ff0000;" class="alert alert-danger" role="alert">
                    <strong>NO DATA FOUND</strong>
                </div>
            </th>
        </tr>
    @endif

    </tbody>
</table>

<div class="pull-right">
    @if(is_array($result) && count($result) > 0)
        {{ $links }}
    @endif
</div>

<script>
    @if(is_array($result) && count($result) > 0)
    $("#sample_1_length").show();
    @else
    $("#sample_1_length").hide();
    @endif
</script>
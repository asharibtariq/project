<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
       aria-describedby="sample_1_info">
    <thead>
    <tr role="row">
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> Sr#</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="1"> PSDP</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> ID</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Name</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Cost</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> local_fund</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> foreign_fund</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> start_date</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> end_date</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Complete Date</th>
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
                <td> {{$r->cost}} </td>
                <td> {{$r->local_fund}} </td>
                <td> {{$r->foreign_fund}} </td>
                <td> {{$r->start_date}} </td>
                <td> {{$r->end_date}} </td>
                <td> {{$r->complete_date}} </td>
                <td>
                    @if($r->status == 'Y')
                        <button type="button" class="btn btn-primary">Active</button>
                    @elseif($r->status == 'N')
                        <button type="button" class="btn btn-danger">In-active</button>
                    @endif
                </td>
                <td>
                    <a href="{{url('project', $r->id)}}" class="btn btn-success" id="btn-view"><i class="fa fa-list"></i> Details</a>
                    <a onClick="return confirm('Are you sure you want to update?');" href="{{url('edit_project', $r->id)}}" class="btn btn-info" id="btn-view"><i class="fa fa-edit"></i> Edit</a>
                    <a onClick="return confirm('Are you sure you want to delete?');" href="{{url('delete_project', $r->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    @else
        <tr>
            <th scope="row" colspan="8">
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
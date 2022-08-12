<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
       aria-describedby="sample_1_info">
    <thead>
    <tr role="row">
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> Sr#</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="1"> FY</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Project</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Allocation - Rupee Allocation</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Allocation - Foreign Aid</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Allocation - Revised Rupee Allocation</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Release - Funds authorized by M/o PD&SI (Rupee)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Release - Actual released/sanctioned by Ministry/Division Rupee</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Release - Foreign Aid Disbursed</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Release - Total actual releases/disbursement</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Utilization - Actual Rupee Utilization</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Utilization - Foreign Aid Utilization</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Utilization - Total Utilization</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Amount Surrendered</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Amount Lapsed</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Financial Progress (%)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Physical Progress (%)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Completion on date/likely date of Completion</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Operation</th>
    </thead>
    <tbody>

    @php
        $i = 1;
    @endphp
    @if(is_array($result) && count($result) > 0)
        @foreach ($result as $r)
        <?php
            $fiscal_year_start = $r->fiscal_year - 1;
            $fiscal_year = $fiscal_year_start." - ".$r->fiscal_year;
        ?>
            <tr role="row">
                <td> {{$i}} </td>
                <td> {{$fiscal_year}} </td>
                <td> {{$r->project}} </td>
                <td> {{$r->alloc_rupee > 0 ? $r->alloc_rupee : '-'}} </td>
                <td> {{$r->alloc_foreign > 0 ? $r->alloc_foreign : '-'}} </td>
                <td> {{$r->alloc_revised > 0 ? $r->alloc_revised : '-'}} </td>
                <td> {{$r->release_fund_auth > 0 ? $r->release_fund_auth : '-'}} </td>
                <td> {{$r->release_fund_actual > 0 ? $r->release_fund_actual : '-'}} </td>
                <td> {{$r->release_foreign > 0 ? $r->release_foreign : '-'}} </td>
                <td> {{$r->release_total_actual > 0 ? $r->release_total_actual : '-'}} </td>
                <td> {{$r->util_actual > 0 ? $r->util_actual : '-'}} </td>
                <td> {{$r->util_foreign > 0 ? $r->util_foreign : '-'}} </td>
                <td> {{$r->util_total > 0 ? $r->util_total : '-'}} </td>
                <td> {{$r->amt_surrender > 0 ? $r->amt_surrender : '-'}} </td>
                <td> {{$r->amt_lapsed > 0 ? $r->amt_lapsed : '-'}} </td>
                <td> {{$r->financial_prog > 0 ? $r->financial_prog : '-'}} </td>
                <td> {{$r->physical_prog > 0 ? $r->physical_prog : '-'}} </td>
                <td> {{$r->comp_date_likely > 0 ? $r->comp_date_likely : '-'}} </td>
                <td>
                    <a onClick="return confirm('Are you sure you want to update?');" href="{{url('edit_report', $r->id)}}" class="btn btn-info" id="btn-view"><i class="fa fa-edit"></i> Edit</a>
                    <a onClick="return confirm('Are you sure you want to delete?');" href="{{url('delete_report', $r->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    @else
        <tr>
            <th scope="row" colspan="19">
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
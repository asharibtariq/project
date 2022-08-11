<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
       aria-describedby="sample_1_info">
    <thead>
    <tr role="row">
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> Sr#</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="1"> PSPD</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> ID</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> FY</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Project</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Total Cost</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual Expenditure</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Rupee Allocation</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Foreign Aid</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Revised Rupee Allocation</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Funds authorized by M/o PD&SI (Rupee)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual released/ sanctioned by Ministry/Division Rupee</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Foreign Aid Disbursed</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Total actual releases / disbursement (Col 9 +10)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual Rupee Utilization</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Foreign Aid utilization</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Total Utilization (Col 12 + 13)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Amount surrendered (if any)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Amount lapsed (if any)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Financial Progress (%)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Physical Progress (%)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Completion Date as per PC-I</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Completion date/likely date of completion</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Remarks/issues/Bottlenecks (if any)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Note for our use</th>
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
                <td> {{$r->fiscal_year}} </td>
                <td> {{$r->project}} </td>
                <td> {{$r->cost}} </td>
                <td> {{$r->actual_expend}} </td>
                <td> {{$r->alloc_rupee}} </td>
                <td> {{$r->alloc_foreign}} </td>
                <td> {{$r->alloc_revised}} </td>
                <td> {{$r->release_fund_auth}} </td>
                <td> {{$r->release_fund_actual}} </td>
                <td> {{$r->release_foreign}} </td>
                <td> {{$r->release_total_actual}} </td>
                <td> {{$r->util_actual}} </td>
                <td> {{$r->util_foreign}} </td>
                <td> {{$r->util_total}} </td>
                <td> {{$r->amt_surrender}} </td>
                <td> {{$r->amt_lapsed}} </td>
                <td> {{$r->financial_prog}} </td>
                <td> {{$r->physical_prog}} </td>
                <td> {{$r->complete_date}} </td>
                <td> {{$r->comp_date_likely}} </td>
                <td> {{$r->remarks}} </td>
                <td> {{$r->note}} </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    @else
        <tr>
            <th scope="row" colspan="25">
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
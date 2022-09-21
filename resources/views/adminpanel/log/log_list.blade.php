<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
       aria-describedby="sample_1_info">
    <thead>
    <tr role="row">
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> Sr#</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="1"> PSPD</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> ID</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> FY</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Date</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Project</th>
        {{--<th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Total Cost</th>--}}
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual Expenditure</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Rupee Allocation</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Foreign Aid</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Revised Rupee Allocation</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Allocation Total</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Funds authorized by M/o PD&SI (Rupee)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual released/ sanctioned by Ministry/Division Rupee</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Foreign Aid Disbursed</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Total actual releases / disbursement</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual Rupee Utilization</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Foreign Aid utilization</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Total Utilization</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Amount surrendered (if any)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Amount lapsed (if any)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Financial Progress (%)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Physical Progress (%)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Physical Progress Description</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Completion Date as per PC-I</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Completion date/likely date of completion</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Remarks/issues/Bottlenecks (if any)</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Note for our use</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Added By</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Added Date/Time</th>
    </thead>
    <tbody>

    @php
        $i = 1;
        $arr_index = 0;
        $xp = 0;
    @endphp
    @if(is_array($result) && count($result) > 0)
        @foreach ($result as $r)
            <?php
            $record = json_decode($r->data);
            $fiscal_year_start = $record->fiscal_year - 1;
            $fiscal_year = $fiscal_year_start." - ".$record->fiscal_year;
            ?>
            <tr role="row">
                <td> {{$i}} </td>
                <td> {{$r->psdp}} </td>
                <td> {{$r->psid}} </td>
                <td> {{$fiscal_year}} </td>
                <td> {{$record->date}} </td>
                <td> {{$r->project}} </td>
                <td> {{$r->cost}} </td>
                {{--<td> {{$record->actual_expend}}</td>--}}
                <td> {{$record->alloc_rupee}} </td>
                <td> {{$record->alloc_foreign}} </td>
                <td> {{$record->alloc_revised}} </td>
                <td> {{$record->alloc_total}} </td>
                <td> {{$record->release_fund_auth}} </td>
                <td> {{$record->release_fund_actual}} </td>
                <td> {{$record->release_foreign}} </td>
                <td> {{$record->release_total_actual}} </td>
                <td> {{$record->util_actual}} </td>
                <td> {{$record->util_foreign}} </td>
                <td> {{$record->util_total}} </td>
                <td> {{$record->amt_surrender}} </td>
                <td> {{$record->amt_lapsed}} </td>
                <td> {{$record->financial_prog}} </td>
                <td> {{$record->physical_prog}} </td>
                <td> {{$record->physical_prog_desc}} </td>
                <td> {{$r->complete_date}} </td>
                <td> {{$record->comp_date_likely}} </td>
                <td> {{$record->remarks}} </td>
                <td> {{$record->note}} </td>
                <td> {{$r->user_name}} </td>
                <td> {{$r->created_at}} </td>
            </tr>
            @php
                $i++;
                $arr_index++;
            @endphp
        @endforeach
    @else
        <tr>
            <th scope="row" colspan="29">
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
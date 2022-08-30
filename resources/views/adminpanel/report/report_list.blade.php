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
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Total Cost</th>
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
    </thead>
    <tbody>

    @php
        $i = 1;
        $arr_index = 0;
        $cost = 0;
        $actual_expend =0;
        $alloc_rupee =0;
        $alloc_foreign =0;
        $alloc_total =0;
        $alloc_revised =0;
        $release_fund_auth =0;
        $release_fund_actual =0;
        $release_foreign =0;
        $release_total_actual =0;
        $util_actual =0;
        $util_foreign =0;
        $util_total =0;
        $amt_surrender =0;
        $amt_lapsed =0;
        $financial_prog =0;
        $physical_prog =0;
    @endphp
    @if(is_array($result) && count($result) > 0)

        @foreach ($result as $r)
        <?php
            if ($arr_index > 0){
            $arr_index_minus_1 = $arr_index - 1;
            $xp = $xp + $result[$arr_index_minus_1]->util_total;
            } else {
            $xp = 0;
            }

            $fiscal_year_start = $r->fiscal_year - 1;
            $fiscal_year = $fiscal_year_start." - ".$r->fiscal_year;

            $cost = $cost + $r->cost;
            $actual_expend = $actual_expend + $xp;
            $alloc_rupee = $alloc_rupee + $r->alloc_rupee;
            $alloc_foreign = $alloc_foreign + $r->alloc_foreign;
             $alloc_total = $alloc_total + $r->alloc_total;
            $alloc_revised = $alloc_revised + $r->alloc_revised;
            $release_fund_auth = $release_fund_auth + $r->release_fund_auth;
            $release_fund_actual = $release_fund_actual + $r->release_fund_actual;
            $release_foreign = $release_foreign + $r->release_foreign;
            $release_total_actual = $release_total_actual + $r->release_total_actual;
            $util_actual = $util_actual + $r->util_actual;
            $util_foreign = $util_foreign + $r->util_foreign;
            $util_total = $util_total + $r->util_total;
            $amt_surrender = $amt_surrender + $r->amt_surrender;
            $amt_lapsed = $amt_lapsed + $r->amt_lapsed;
            $financial_prog = $financial_prog + $r->financial_prog;
            $physical_prog = $physical_prog + $r->physical_prog;
        ?>
            <tr role="row">
                <td> {{$i}} </td>
                <td> {{$r->psdp}} </td>
                <td> {{$r->psid}} </td>
                <td> {{$fiscal_year}} </td>
                <td> {{$r->date}} </td>
                <td> {{$r->project}} </td>
                <td> {{$r->cost}} </td>
                <td> {{--$r->actual_expend--}} {{$xp}}</td>
                <td> {{$r->alloc_rupee}} </td>
                <td> {{$r->alloc_foreign}} </td>
                <td> {{$r->alloc_revised}} </td>
                <td> {{$r->alloc_total}} </td>
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
                <td> {{$r->physical_prog_desc}} </td>
                <td> {{$r->complete_date}} </td>
                <td> {{$r->comp_date_likely}} </td>
                <td> {{$r->remarks}} </td>
                <td> {{$r->note}} </td>
            </tr>
            @php
                $i++;
                $arr_index++;
            @endphp
        @endforeach
        <tr>
            <th colspan="6" class="text-center">Total</th>
            <td>{{$cost}}</td>
            <td>{{$actual_expend}}</td>
            <td>{{$alloc_rupee}}</td>
            <td>{{$alloc_foreign}}</td>
            <td>{{$alloc_total}}</td>
            <td>{{$alloc_revised}}</td>
            <td>{{$release_fund_auth}}</td>
            <td>{{$release_fund_actual}}</td>
            <td>{{$release_foreign}}</td>
            <td>{{$release_total_actual}}</td>
            <td>{{$util_actual}}</td>
            <td>{{$util_foreign}}</td>
            <td>{{$util_total}}</td>
            <td>{{$amt_surrender}}</td>
            <td>{{$amt_lapsed}}</td>
            {{--<td>{{$financial_prog}}</td>--}}
            {{--<td>{{$physical_prog}}</td>--}}
            <td colspan="7"></td>
        </tr>
    @else
        <tr>
            <th scope="row" colspan="28">
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
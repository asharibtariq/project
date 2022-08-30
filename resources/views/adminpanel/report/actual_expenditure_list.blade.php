<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
       aria-describedby="sample_1_info">
    <thead>
    <tr role="row">
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> FY</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="1"> Date</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual Expenditure</th>
    </thead>
    <tbody>

    @if(is_array($result) && count($result) > 0)
            <?php
            $arr_index = 0;
            $xp = 0;
            ?>
            @foreach ($result as $r)
                <?php
                if ($arr_index > 0){
                    $arr_index_minus_1 = $arr_index - 1;
                    $xp = $xp + $result[$arr_index_minus_1]->util_total;
                } else {
                    $xp = 0;
                }
                $arr_index++;
                ?>
            @endforeach

            <?php
            $fiscal_year_start = $result[0]->fiscal_year - 1;
            $fiscal_year = $fiscal_year_start." - ".$result[0]->fiscal_year;
            ?>

            <tr role="row">
                <td> {{$fiscal_year}} </td>
                <td> {{$result[0]->date}}</td>
                <td> {{--$r->actual_expend--}}{{$xp}}</td>
            </tr>

    @else
        <tr>
            <th scope="row" colspan="4">
                <div style="color: black; text-align: center;">
                    No Data Found
                </div>
            </th>
        </tr>
    @endif

    </tbody>
</table>

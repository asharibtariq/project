<table class="table table-hover">
    <thead>
    <tr>
        <th> Sr No </th>
        <th> FY </th>
        <th> Date </th>
        <th> Local Amount Surrender </th>
        <th> Foreign Amount Surrender </th>
        <th> Local Amount Lapsed </th>
        <th> Foreign Amount Lapsed </th>
        <th> Financial Progress </th>
        <th> Physical Progress </th>
        <th> Remarks </th>
        <th> Action </th>
    </tr>
    </thead>
    <tbody>
    @php
        $i = 1;
        $alloc_amount = 0;
        $lapse_amount = 0;
        $foreign_alloc_amount = 0;
    @endphp
    @if(is_array($result) && count($result) > 0)
        @foreach ($result as $r)

            <?php
            $fiscal_year_start = $r->fiscal_year - 1;
            $fiscal_year = $fiscal_year_start." - ".$r->fiscal_year;

            $alloc_amount = $alloc_amount + $r->local_amount_surrender;
            $lapse_amount = $lapse_amount + $r->local_amount_lapsed;
            ?>

            <tr role="row">
                <td> {{$i}} </td>
                <td> {{$fiscal_year}} </td>
                <td> {{$r->date}} </td>
                <td> {{$r->local_amount_surrender}} (<small class="text-muted">{{$r->currency_surrender}}</small>) </td>
                <td> {{$r->foreign_amount_surrender}} </td>
                <td> {{$r->local_amount_lapsed}} (<small class="text-muted">{{$r->currency_lapsed}}</small>) </td>
                <td> {{$r->foreign_amount_lapsed}}  </td>
                <td> {{$r->financial_progress}} </td>
                <td> {{$r->physical_progress}} </td>
                <td> {{$r->remarks}} </td>
                <td>
                    <div class="btn-group">
                        <a onClick="return confirm('Are you sure you want to update?');" title="Edit" href="{{url('edit_end_of_fy', $r->id)}}" class="btn btn-info" id="btn-view"><i class="fa fa-edit"></i> </a>
                        <a onClick="return confirm('Are you sure you want to delete?');" title="Delete" href="#" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                    </div>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        <tr>
            <th colspan="3" class="text-center">Total</th>
            <td>{{$alloc_amount}}</td>
            <th colspan="1" class="text-center"></th>
            <td>{{$lapse_amount}}</td>
            <td>-</td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
    @else
        <tr>
            <th scope="row" colspan="11">
                <div style="color:#FFFFFF;text-align: center; background-color: #ff0000;" class="alert alert-danger" role="alert">
                    <strong>No Data Found</strong>
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
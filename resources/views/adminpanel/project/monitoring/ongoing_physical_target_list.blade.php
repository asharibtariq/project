<table class="table table-hover">
    <thead>
    <tr>
        <th> Sr No </th>
        <th> FY </th>
        <th> Component </th>
        <th> Targets </th>
        <th> Allocated Budget </th>
        <th> Start Date </th>
        <th> End Date </th>
        <th> Action </th>
    </tr>
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
                <td> {{$fiscal_year}}</td>
                <td> {{$r->component}}</td>
                <td> {{$r->physical_description}}</td>
                <td> {{$r->amount}} (<small class="text-muted">{{$r->currency}}</small>)</td>
                <td> {{$r->start_date}}</td>
                <td> {{$r->end_date}}</td>
                <td>
                    <div class="btn-group">
                        <a onClick="return confirm('Are you sure you want to update?');" title="Edit" href="#" class="btn btn-info" id="btn-view"><i class="fa fa-edit"></i> </a>
                    </div>
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
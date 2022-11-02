<table class="table table-hover">
    <thead>
    <tr>
        <th> Sr No </th>
        <th> FY </th>
        <th> Date </th>
        <th> Amount Allocated (<small class="text-muted">PKR</small>) </th>
        <th> Foreign Aid </th>
        <th> Action </th>
    </tr>
    </thead>
    <tbody>
    @php
        $i = 1;
    @endphp
    @if(is_array($result) && count($result) > 0)
        @foreach ($result as $r)

            <tr role="row">
                <td> {{$i}} </td>
                <td>2050</td>
                <td>10-10-2022</td>
                <td>5000</td>
                <td>50$</td>
                <td>
                    <div class="btn-group">
                        <a onClick="return confirm('Are you sure you want to update?');" title="Edit" href="#" class="btn btn-info" id="btn-view"><i class="fa fa-edit"></i> </a>
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
            <td>5000</td>
            <td>50$</td>
            <td>-</td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
    @else
        <tr>
            <th scope="row" colspan="6">
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
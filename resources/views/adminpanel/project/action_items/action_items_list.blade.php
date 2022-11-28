<table class="table table-hover">
    <thead>
    <tr>
        <th> Sr No </th>
        <th> Task Detail </th>
        <th> Date Monitored </th>
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
                <td> {{$r->physical_description}}</td>
                <td> {{$r->created_at}}</td>
                <td>
                    <div class="btn-group">
                        <a onClick="return confirm('Are you sure you want to review?');" title="Review" href="#" class="btn btn-info" id="btn-view"><i class="fa fa-edit"></i> Review</a>
                    </div>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    @else
        <tr>
            <th scope="row" colspan="4">
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
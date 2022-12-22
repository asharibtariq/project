<table class="table table-hover">
    <thead>
    <tr>
        <th> Sr No </th>
        <th> Component </th>
        <th> Action Item </th>
        <th> Assigned To </th>
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
                <td> {{$r->component}}</td>
                <td> {{$r->action_item}}</td>
                <td> {{$r->assigned_to}}</td>
                <td>
                    <div class="btn-group">
                        <a onClick="return confirm('Are you sure you want to update?');" title="Update" href="{{url('update_action_item', $r->id)}}" class="btn btn-info" id="btn-view"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    @else
        <tr>
            <th scope="row" colspan="5">
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
<table class="table table-hover">
    <thead>
    <tr>
        <th> Sr. No </th>
        <th> Date </th>
        <th> Pace </th>
        <th> Status </th>
    </tr>
    </thead>
    <tbody>
    @php
        $i = 1;
        $alloc_amount = 0;
        $foreign_alloc_amount = 0;
    @endphp
    @if(is_array($result) && count($result) > 0)
        @foreach ($result as $r)
            <tr role="row">
                <td> {{$i}} </td>
                <td> {{$r->date}} </td>
                <td>
                    <?php
                    if ($r->pace == 'fast'){
                        echo '<span class="text-success">Fast</span>';
                    } elseif ($r->pace == 'on_track'){
                        echo '<span class="text-info">On Track</span>';
                    } elseif ($r->pace == 'slow'){
                        echo '<span class="text-danger">Slow</span>';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($r->status == 'complete'){
                        echo '<span class="text-success">Complete</span>';
                    } elseif ($r->status == 'in_process'){
                        echo '<span class="text-info">In Process</span>';
                    } elseif ($r->status == 'halted'){
                        echo '<span class="text-danger">Halted</span>';
                    }
                    ?>
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
<div class="row">
<ul class="nav nav-pills mb-3" role="tablist">
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'physical_target_status_monitoring' ? 'active' : '' @endphp" href="{{url('physical_target_status_monitoring', $physical_target_id)}}" role="tab" aria-selected="true">Physical Target Status</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'financial_progress_monitoring' ? 'active' : '' @endphp" href="{{url('financial_progress_monitoring', $physical_target_id)}}" role="tab" aria-selected="true">Financial Progress</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'physical_progress_monitoring' ? 'active' : '' @endphp" href="{{url('physical_progress_monitoring', $physical_target_id)}}" role="tab" aria-selected="true">Physical Progress</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_issue_monitoring' ? 'active' : '' @endphp" href="{{url('add_issue_monitoring', $physical_target_id)}}" role="tab" aria-selected="true">Issues</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_suggestion_monitoring' ? 'active' : '' @endphp" href="{{url('add_suggestion_monitoring', $physical_target_id)}}" role="tab" aria-selected="true">Suggestions</a>
    </li>
</ul>
</div>
<hr/>
<br/>

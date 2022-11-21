<div class="row">
<ul class="nav nav-pills mb-3" role="tablist">
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'completed_physical_targets' ? 'active' : '' @endphp" href="{{url('completed_physical_targets', $project_id)}}" role="tab" aria-selected="true">Completed</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'not_achieved_physical_targets' ? 'active' : '' @endphp" href="{{url('not_achieved_physical_targets', $project_id)}}" role="tab" aria-selected="true">Not Achieved</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'ongoing_physical_targets' ? 'active' : '' @endphp" href="{{url('ongoing_physical_targets', $project_id)}}" role="tab" aria-selected="true">On Going</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'financial_progress' ? 'active' : '' @endphp" href="{{url('financial_progress', $project_id)}}" role="tab" aria-selected="true">Financial Progress</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'physical_progress' ? 'active' : '' @endphp" href="{{url('physical_progress', $project_id)}}" role="tab" aria-selected="true">Physical Progress</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'issues' ? 'active' : '' @endphp" href="{{url('issues', $project_id)}}" role="tab" aria-selected="true">Issues</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'suggestions' ? 'active' : '' @endphp" href="{{url('suggestions', $project_id)}}" role="tab" aria-selected="true">Suggestions</a>
    </li>
</ul>
</div>
<hr/>
<br/>

<div class="row">
<ul class="nav nav-pills mb-3" role="tablist">
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_project_director' ? 'active' : '' @endphp" href="{{url('add_project_director', $project_id)}}" role="tab" aria-selected="true">PD</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_project_allocation' ? 'active' : '' @endphp" href="{{url('add_project_allocation', $project_id)}}" role="tab" aria-selected="false">Allocation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_release' ? 'active' : '' @endphp" href="{{url('add_release', $project_id)}}" role="tab" aria-selected="false">Release</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_component_pc1' ? 'active' : '' @endphp" href="{{url('add_component_pc1', $project_id)}}" role="tab" aria-selected="false">Components (PC-1)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_component_nis' ? 'active' : '' @endphp" href="{{url('add_component_nis', $project_id)}}" role="tab" aria-selected="false">Components (NIS)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_fy_util' ? 'active' : '' @endphp" href="{{url('add_fy_util', $project_id)}}" role="tab" aria-selected="false">FY Utilization</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_physical_target' ? 'active' : '' @endphp" href="{{url('add_physical_target', $project_id)}}" role="tab" aria-selected="false">Physical Targets</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'edit_pc4' ? 'active' : '' @endphp" href="{{url('edit_pc4', $project_id)}}" role="tab" aria-selected="false">PC-4</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @php echo $current_page == 'add_end_of_fy' ? 'active' : '' @endphp" href="{{url('add_end_of_fy', $project_id)}}" role="tab" aria-selected="false">End of FY</a>
    </li>
</ul>
</div>
<hr/>
<br/>

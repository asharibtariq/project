@php
$fiscal_year_start = $physical_target->fiscal_year - 1;
$fiscal_year = $fiscal_year_start." - ".$physical_target->fiscal_year;
@endphp

<div class="row">
    <div class="col-md-12">
        <h4>Physical Target</h4>
    </div>
    <div class="col-md-12">
        <hr/>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h4><strong class="text-muted">FY:</strong> <span class="float-right">{{$fiscal_year}}</span></h4>
        <h4><strong class="text-muted">Budget Required:</strong> <span class="float-right">{{$physical_target->amount}}</span></h4>
        <h4><strong class="text-muted">Actual Start Date:</strong> <span class="float-right">{{$physical_target->start_date}}</span></h4>
    </div>
    <div class="col-md-6">
        <h4><strong class="text-muted">Component:</strong> <span class="float-right">{{$physical_target->component}}</span></h4>
        <h4><strong class="text-muted">Description:</strong> <span class="float-right">{{$physical_target->physical_description}}</span></h4>
        <h4><strong class="text-muted">Actual End Date:</strong> <span class="float-right">{{$physical_target->end_date}}</span></h4>
    </div>
    <div class="col-md-12">
        <hr/>
    </div>
</div>
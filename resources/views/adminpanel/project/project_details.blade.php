@php
$fiscal_year_start = $project->fiscal_year - 1;
$fiscal_year = $fiscal_year_start." - ".$project->fiscal_year;
@endphp

<div class="row">
    <div class="col-md-6">
        <h4><strong class="text-muted">Name:</strong> <span class="float-right">{{$project->name}}</span></h4>
        <h4><strong class="text-muted">ID:</strong> <span class="float-right">{{$project->psid}}</span></h4>
        <h4><strong class="text-muted">Approval Type:</strong> <span class="float-right">{{$project->approval_type}}</span></h4>
        <h4><strong class="text-muted">Executive Agency:</strong> <span class="float-right">{{$project->executiveagency}}</span></h4>
        <h4><strong class="text-muted">Start Date:</strong> <span class="float-right">{{$project->start_date}}</span></h4>
    </div>
    <div class="col-md-6">
        <h4><strong class="text-muted">PSDP:</strong> <span class="float-right">{{$project->psdp}}</span></h4>
        <h4><strong class="text-muted">Fiscal Year:</strong> <span class="float-right">{{$fiscal_year}}</span></h4>
        <h4><strong class="text-muted">Approval Date:</strong> <span class="float-right">{{$project->approval_date}}</span></h4>
        <h4><strong class="text-muted">Forum:</strong> <span class="float-right">{{$project->forum}}</span></h4>
        <h4><strong class="text-muted">End Date:</strong> <span class="float-right">{{$project->end_date}}</span></h4>
    </div>
    <div class="col-md-12">
        <hr/>
    </div>
</div>
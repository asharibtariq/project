<!--
<a href="#" class="list-group-item-action-main"><i class="fa fa-search" aria-hidden="true"></i> Quick Search(ctrl+q)</a>
<a href="#" class="list-group-item-action-main"><i class="fa fa-share share-icon" aria-hidden="true"></i> Shortcuts (ctrl+;)</a>
<div class="list-group-item-action-main bg-navmenu"><img style="opacity: 0;" src="images/2.png" alt="logo"> Main Navigation</div>
-->
<a href="javascript:;" data-toggle="collapse" data-target="#project-menu" class="list-group-item-action-main"><i class="fa fa-database" aria-hidden="true"></i> Project <i style="float: right;margin-right: 0;" class="fa fa-angle-down" aria-hidden="true"></i></a>
<div id="project-menu" class="collapse left-bar-main-collapse">
    <a class="left-bar-submenu" href="{{ url('project') }}"><i class="fa fa-file" aria-hidden="true"></i> List</a>
    <a class="left-bar-submenu" href="{{ url('add_project') }}"><i class="fa fa-file" aria-hidden="true"></i> Add</a>
</div>
<a href="{{ url('report') }}" class="list-group-item-action-main"><i class="fa fa-file" aria-hidden="true"></i> Report <!-- <i class="fa fa-angle-down" aria-hidden="true"></i> --></a>

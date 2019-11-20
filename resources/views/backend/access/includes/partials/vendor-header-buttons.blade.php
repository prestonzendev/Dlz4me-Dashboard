<!--Action Button-->
@if(Active::checkUriPattern('admin/access/user/customers') || Active::checkUriPattern('admin/access/user/customers/deleted') || Active::checkUriPattern('admin/access/user/customers/deactivated'))
@endif
<!--Action Button-->
<div class="btn-group">
    <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">Action
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('admin.access.user.vendor.index')}}"><i class="fa fa-list-ul"></i> List</a></li>
        @permission('create-user')
        <li><a href="{{route('admin.access.user.vendor.create')}}"><i class="fa fa-plus"></i> Add new</a></li>
        @endauth
        @permission('view-deactive-user')
        <li><a href="{{route('admin.access.user.deactivated')}}"><i class="fa fa-square"></i> Deactivated Users</a></li>
        @endauth
        @permission('view-deleted-user')
        @endauth
    </ul>
</div>

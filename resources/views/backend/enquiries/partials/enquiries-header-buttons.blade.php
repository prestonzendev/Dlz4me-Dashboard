<!--Action Button-->
<div class="btn-group">
    <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">Action
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route( 'admin.enquiries.index' ) }}">
                <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.enquiries.all' ) }}
            </a>
        </li>
    </ul>
</div>
<div class="clearfix"></div>

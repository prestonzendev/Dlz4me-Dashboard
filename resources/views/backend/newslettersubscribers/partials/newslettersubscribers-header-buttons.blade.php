<!--Action Button-->
@if( Active::checkUriPattern( 'admin/newslettersubscribers' ) )
    <div class="btn-group">
        <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">Export
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li id="csvButton"><a href="#"><i class="fa fa-file-text-o"></i> CSV</a></li>
            <li id="excelButton"><a href="#"><i class="fa fa-file-excel-o"></i> Excel</a></li>
        </ul>
    </div>
@endif
<!--Action Button-->
<!-- <div class="btn-group">
    <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">Action
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route( 'admin.newslettersubscribers.index' ) }}">
                <i class="fa fa-list-ul"></i> List All Subscribers
            </a>
        </li>
        @permission( 'create-newslettersubscriber' )
            <li>
                <a href="{{ route( 'admin.newslettersubscribers.create' ) }}">
                    <i class="fa fa-plus"></i> Create New Subscriber
                </a>
            </li>
        @endauth
    </ul>
</div> -->
<div class="clearfix"></div>

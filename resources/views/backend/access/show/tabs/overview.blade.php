<table class="table table-striped table-hover">

    <tr>
        <th>Profile Pic</th>
        <td>
            {!! $user->profilepic !!}
            @if (!empty($user->profilepic))
             {!! $user->picapproved !!}
            @endif
        </td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.name') }}</th>
        <td>{{ $user->first_name .' '. $user->last_name }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.email') }}</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.phone') }}</th>
        <td>{{ $user->phone }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.address') }}</th>
        <td>{{ $user->address }} {{ $user->address_2 }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.city') }}</th>
        <td>{{ $user->city }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.state') }}</th>
        <td>{{ $user->state }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.country') }}</th>
        <td>{{ $user->country }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.zip') }}</th>
        <td>{{ $user->zip }}</td>
    </tr>
    </tr>
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.phone') }}</th>
        <td>{{ $user->phone }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.pin_code') }}</th>
        <td>{{ $user->pin_code }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.status') }}</th>
        <td>{!! $user->status_label !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.confirmed') }}</th>
        <td>{!! $user->confirmed_label !!}</td>
    </tr>

    <tr>
        <th>Note:</th>
        <td>{{ $user->adminnote }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.created_at') }}</th>
        <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.last_updated') }}</th>
        <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
    </tr>

    @if ($user->trashed())
        <tr>
            <th>{{ trans('labels.backend.access.users.tabs.content.overview.deleted_at') }}</th>
            <td>{{ $user->deleted_at }} ({{ $user->deleted_at->diffForHumans() }})</td>
        </tr>
    @endif
</table>

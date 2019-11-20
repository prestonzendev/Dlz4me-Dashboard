<header class="main-header">
    <a href="{{ route('frontend.index') }}" class="logo">
        <span class="logo-mini">
            {{ substr(app_name(), 0, 1) }}
        </span>
        <span class="logo-lg">
            @php
            $settings = settings();
            @endphp

            @if($settings->logo != "" && file_exists(public_path().'/../storage/app/img/logo/'.$settings->logo))
            <img width="150" class="navbar-brand" src="{{route('frontend.index')}}/../storage/app/img/logo/{{$settings->logo}}">
            @else
            {{ app_name() }}
            @endif
        </span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @if (config('locale.status') && count(config('locale.languages')) > 1)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-language"></i> {{ trans('menus.language-picker.language') }} <span class="caret"></span>
                    </a>
                    @include('includes.partials.lang')
                </li>
                @endif

                <!--                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="label label-info">0</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="header">{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}</li>
                                        <li class="footer">
                                            {{ link_to('#', trans('strings.backend.general.see_all.messages')) }}
                                        </li>
                                    </ul>
                                </li> /.messages-menu -->

                <!--                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <small>Notifications | </small><i class="fa fa-bell-o"></i>
                                        <span class="label label-info notification-counter"></span>
                                    </a>
                                    <ul class="dropdown-menu notification-menu-container">
                                    </ul>
                                </li> /.notifications-menu -->

                <!--                <li class="dropdown tasks-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-flag-o"></i>
                                        <span class="label label-info">0</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="header">{{ trans_choice('strings.backend.general.you_have.tasks', 0, ['number' => 0]) }}</li>
                                        <li class="footer">
                                            {{ link_to('#', trans('strings.backend.general.see_all.tasks')) }}
                                        </li>
                                    </ul>
                                </li> /.tasks-menu -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<img src="{{ access()->user()->picture }}" class="user-image" alt="User Avatar"/>-->
                        @if (access()->user()->pin_code)
                            <span class="hidden-xs">{{ access()->user()->first_name }} - {{ access()->user()->pin_code }}</span>
                        @else
                            <span class="hidden-xs">{{ access()->user()->first_name }}</span>
                        @endif
                        <div class="clearfix"></div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <!--                        <li class="user-header">
                                                    <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Avatar" />
                                                    <p>
                                                        {{-- access()->user()->name }} - {{ implode(", ", access()->user()->roles->lists('name')->toArray()) --}}
                                                        <small>{{ trans('strings.backend.general.member_since') }} {{ access()->user()->created_at->format("m/d/Y") }}</small>
                                                    </p>
                                                </li>-->

                        <li class="user-body">
                            <div class="col-xs-12 text-center">
                                {{ link_to_route("admin.profile.edit", 'Edit Profile') }}
                            </div>
                        </li>
                        <li class="user-body border-left">
                            <div class="col-xs-12 text-center">
                                {{ link_to_route('admin.access.user.change-password','Change Password', access()->user()->id) }}
                            </div>
                            {{-- <div class="col-xs-4 text-center">
                                {{ link_to_route('dashboard', 'Link') }}
                            </div> --}}
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! url('admin') !!}" class="btn btn-default btn-flat">
                                    <i class="fa fa-home"></i>
                                            {{ trans('navs.general.home') }}
                                            </a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{!! url('admin/logout') !!}" class="btn btn-danger btn-flat">
                                                <i class="fa fa-sign-out"></i>
                                                {{ trans('navs.general.logout') }}
                                            </a>
                                        </div>
                                        </li>
                                        </ul>
                                        </li>
                                        </ul>
                                    </div><!-- /.navbar-custom-menu -->
                                    </nav>
                                    </header>
